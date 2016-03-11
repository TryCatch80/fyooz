<?php

/**
 *
 *
 * This is the helper pdf.php file for jobgrokapp
 *
 * Created: November 18, 2014, 3:25 am
 *
 * Subversion Details
 * $Date: 2013-03-30 23:23:58 -0500 (Sat, 30 Mar 2013) $
 * $Revision: 4899 $
 * $Author: bobsteen $
 *
 * @author TK Tek, LLC. info@jobgrok.com
 * @version 3.1-1.2.55
 * @package com_jobgrokapp
 *
 * @copyright Copyright {c} 2008-2014
 * @license GNU Public License Version 2
 *
 * This file is part of JobGrok.
 *
 * JobGrok is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * JobGrok is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with JobGrok.  If not, see <http://www.gnu.org/licenses/>.
 *
 * This would not have been possible (well, maybe, but it was definitely
 * very very helpfull) without devzone.zend.com/article/1254.
 * Thank you ver many for the tutorial!
 *
 */
class JGPdf {
    var $_convert_encoding = true;
    var $_convert_from = 'UTF-8';
    var $_convert_to = 'ISO-8859-1';
    var $_cont = false;
    var $_title = "";
    var $_header = "";
    var $_lastwasnewpage = false;
    var $_lastwasheader = false;
    var $_line = 1;
    var $_lines_per_page = 42;
    var $_buffer = '';
    var $_state = 0;
    var $_page = 0;
    var $_n = 2;
    var $_offsets = array();
    var $_pages = array();
    var $_w;
    var $_h;
    var $_fonts = array();
    var $_font_family = '';
    var $_font_style = '';
    var $_current_font;
    var $_font_size = 12;
    var $_compress;
    var $_core_fonts = array('courier' => 'Courier',
        'courierB' => 'Courier-Bold',
        'courierI' => 'Courier-Oblique',
        'courierBI' => 'Courier-BoldOblique',
        'helvetica' => 'Helvetica',
        'helveticaB' => 'Helvetica-Bold',
        'helveticaI' => 'Helvetica-Oblique',
        'helveticaBI' => 'Helvetica-BoldOblique',
        'times' => 'Times-Roman',
        'timesB' => 'Times-Bold',
        'timesI' => 'Times-Italic',
        'timesBI' => 'Times-BoldItalic',
        'symbol' => 'Symbol',
        'zapfdingbats' => 'ZapfDingbats');

    function scrub($value) {
        return str_replace("\r", " ", $value);
    }

    function outTitle($title, $inc = true) {
        $this->_title = $this->scrub($title);
        $this->setFont('Helvetica', 'B', 16);
        $this->text(70, $this->_getY(), $title);
        if ($inc)
            $this->nextLine(3);
    }

    function outHeader($header, $inc = true) {
        $this->_header = $this->scrub($header);
        $this->setFont('Helvetica', 'B', 12);
        $this->text(70, $this->_getY() + 8, $header);
        if ($inc)
            $this->nextLine(2);
    }

    function outCont() {
        $this->setFont('Helvetica', 'I', 10);
        $this->text(70, $this->_getY(), "(" . $this->_header . " cont...)");
        $this->_cont = false;
        $this->nextLine();
    }

    function outField($field, $inc = true) {
        $field = $this->scrub($field);
        if ($this->_cont)
            $this->outCont();
        $mytext = $this->wrapText($field);
        foreach ($mytext as $line) {
            $this->setFont('Helvetica', 'B', 10);
            $this->text(70, $this->_getY(), $line);
            if ($inc)
                $this->nextLine(1, true);
        }
    }

    function hasNewLine($chunk) {
        if (strpos($chunk, "\n"))
            return true;
        return false;
    }

    function wrapText($text, $char_count = 100, $start = 0) {
        $text = $this->scrub($text);
        while (strlen($text) > $char_count + 1) {
            $left_chunk = substr($text, 0, $char_count + 1);
            if ($this->hasNewLine($left_chunk)) {
                $last_space = strpos($left_chunk, "\n");
            } else {
                $last_space = strrpos($left_chunk, ' ');
            }
            $left_chunk = trim(substr($left_chunk, 0, $last_space));
            $text = trim(substr($text, $last_space, strlen($text) - $last_space));
            $results[] = $left_chunk;
        }
        $results[] = $text;
        return $results;
    }

    function outValue($value, $inc = true, $left = false, $wrap_len = 0) {
        $value = $this->scrub($value);
        if ($left) {
            $left_pos = 70;
            if ($wrap_len == 0)
                $wrap_len = 100;
        }
        else {
            $left_pos = 250;
            if ($wrap_len == 0)
                $wrap_len = 60;
        }
        if ($this->_cont)
            $this->outCont();
        $mytext = $this->wrapText($value, $wrap_len);
        foreach ($mytext as $line) {
            $this->setFont('Helvetica', '', 10);
            $this->text($left_pos, $this->_getY(), $line);
            if ($inc)
                $this->nextLine(1, true);
        }
    }

    function outCombo($field, $value) {
        $field = $this->scrub($field);
        if ($this->_cont)
            $this->outCont();
        $this->outField($field, false);
        $this->outValue($value);
    }

    function nextLine($inc = 1, $wrapping = false) {
        $this->_line += $inc;
        if (($this->_line > $this->_lines_per_page - 1)) { //&& !$wrapping)
            //$this->outTimeStamp();
            $this->_line = 1;
            $this->addPage();
        }
    }

    function _getY() {
        return $this->_line * 15 + 70;
    }

    public static function factory($orientation = 'P', $format = 'letter') {
        $pdf = new JGPdf();
        $format = strtolower($format);
        if ($format == 'a3') {
            $format = array(849.89, 1190.55);
        } elseif ($format == 'a4') {
            $format = array(595.28, 841.89);
        } elseif ($format == 'a5') {
            $format = array(420.94, 595.28);
        } elseif ($format == 'letter') {
            $format = array(612, 792);
        } elseif ($format == 'legal') {
            $format = array(612, 1008);
        } else {
            die(sprintf('Unkown page format: %s', $format));
        }
        $pdf->_w = $format[0];
        $pdf->_h = $format[1];

        $orientation = strtolower($orientation);
        if ($orientation == 'l' || $orientation == 'landscape') {
            $w = $pdf->_w;
            $pdf->_w = $pdf->_h;
            $pdf->_h = $w;
        } elseif ($orientation != 'p' && $orientation != 'portrait') {
            die(sprintf('Incorrect orientation: %s', $orientation));
        }
        $pdf->setCompression(true);
        return $pdf;
    }

    function setCompression($compress) {
        $this->_compress = (function_exists('gzcompress') ? $compress : false);
    }

    function setConversion($val = true) {
        $this->_convert_encoding = $val;
    }
    
    function setConvertFrom($val = 'UTF-8') {
        $this->_convert_from = $val;
    }
    
    function setConvertTo($val = 'ISO-8859-1') {
        $this->_convert_to - $val;
    }
    
    function _out($s) {
        $s = $this->scrub($s);
        if ($this->_state == 2) {
            $this->_pages[$this->_page] .= $s . "\n";
        } else {
            $this->_buffer .= $s . "\n";
        }
    }

    function open() {
        $this->_state = 1;
        $this->_out('%PDF-1.3');
    }

    function addPage() {
        $this->_page++;
        $this->_pages[$this->_page] = '';
        $this->_state = 2;
        $this->outPageNumber();
        if ($this->_page > 1)
            $this->_cont = true;
        $this->_lastwasnewpage = true;

        if ($this->_font_family) {
            $this->setFont($this->_font_family, $this->_font_style, $this->_font_size);
        }
    }

    function outPageNumber() {
        $this->setFont('Helvetica', 'I', 8);
        $this->text(70, $this->_getY() + 8, $this->_title);
        $this->text(500, $this->_getY() + 8, "Page " . $this->_page);
        $this->nextLine(3);
    }

    function outTimeStamp() {
        $this->setFont('Helvetica', 'I', 8);
        $this->text(450, $this->_getY() + 8, date("F j, Y, g:i a"));
    }

    function setFont($family, $style = '', $size = null) {
        $family = strtolower($family);
        if ($family == 'arial') {
            $family = 'helvetica';
        } elseif ($family == 'symbol' || $family == 'zapfdingbats') {
            $style = '';
        }

        $style = strtoupper($style);
        if ($style == 'IB') {
            $style = 'BI';
        }

        if (is_null($size)) {
            $size = $this->_font_size;
        }

        if ($this->_font_family == $family &&
                $this->_font_style == $style &&
                $this->_font_size == $size) {
            return;
        }

        $fontkey = $family . $style;

        if (!isset($this->_fonts[$fontkey])) {
            $i = count($this->_fonts) + 1;
            $this->_fonts[$fontkey] = array(
                'i' => $i,
                'name' => $this->_core_fonts[$fontkey]);
        }

        $this->_font_family = $family;
        $this->_font_style = $style;
        $this->_font_size = $size;
        $this->_current_font = $this->_fonts[$fontkey];

        if ($this->_page > 0) {
            $this->_out(sprintf('BT /F%d %.2f Tf ET', $this->_current_font['i'], $this->_font_size));
        }
    }

    function setFontsize($size) {
        if ($this->_font_size == $size) {
            return;
        }
        $this->_font_size = $size;
        if ($this->_page > 0) {
            $this->_out(sprintf('BT /F%d %.2f Tf ET', $this->_current_font['i'], $this->_font_size));
        }
    }

    function text($x, $y, $text) {
        $text = $this->_escape($text);
        $out = sprintf('BT %.2f %.2f Td (%s) Tj ET', $x, $this->_h - $y, $text);
        $this->_out($out);
    }

    function _escape($s) {
        $s = str_replace('\\', '\\\\', $s);
        $s = str_replace('(', '\\(', $s);
        return str_replace(')', '\\)', $s);
    }

    function close() {
        if ($this->_page == 0) {
            $this->addPage();
        }
        $this->_state = 1;
        $this->_putPages();
        $this->_putResources();

        $this->_newobj();
        $this->_out('<<');
        $this->_out('/Producer (see devzone.zend.com/article/1254)');
        $this->_out(sprintf('CreationDate (D:%s)', date('YmdHis')));
        $this->_out('>>');
        $this->_out('endobj');

        $this->_newobj();
        $this->_out('<<');
        $this->_out('/Type /Catalog');
        $this->_out('/Pages 1 0 R');
        $this->_out('/OpenAction [3 0 R /FitH null]');
        $this->_out('/PageLayout /OneColumn');
        $this->_out('>>');
        $this->_out('endobj');

        $start_xref = strlen($this->_buffer);
        $this->_out('xref');
        $this->_out('0 ' . ($this->_n + 1));
        $this->_out('0000000000 65535 f ');

        for ($i = 1; $i <= $this->_n; $i++) {
            $this->_out(sprintf('%010d 00000 n ', $this->_offsets[$i]));
        }

        $this->_out('trailer');
        $this->_out('<<');
        $this->_out('/Size ' . ($this->_n + 1));
        $this->_out('/Root ' . ($this->_n . ' 0 R'));
        $this->_out('/Info ' . ($this->_n - 1) . ' 0 R');
        $this->_out('>>');
        $this->_out('startxref');
        $this->_out($start_xref);
        $this->_out('%%EOF');
        $this->_state = 3;
    }

    function _newobj() {
        $this->_n++;
        $this->_offsets[$this->_n] = strlen($this->_buffer);
        $this->_out($this->_n . ' 0 obj');
    }

    function _putPages() {
        $filter = ($this->_compress) ? '/Filter /FlateDecode ' : '';
        for ($n = 1; $n <= $this->_page; $n++) {
            $this->_newobj();
            $this->_out('<</Type /Page');
            $this->_out('/Parent 1 0 R');
            $this->_out('/Resources 2 0 R');
            $this->_out('/Contents ' . ($this->_n + 1) . ' 0 R>>');
            $this->_out('endobj');

            $p = ($this->_compress) ? gzcompress($this->_pages[$n]) : $this->_pages[$n];

            $this->_newobj();
            $this->_out('<<' . $filter . '/Length ' . strlen($p) . '>>');
            $this->_putStream($p);
            $this->_out('endobj');
        }

        $this->_offsets[1] = strlen($this->_buffer);
        $this->_out('1 0 obj');
        $this->_out('<</Type /Pages');
        $kids = '/Kids [';
        for ($i = 0; $i < $this->_page; $i++) {
            $kids .= (3 + 2 * $i) . ' 0 R ';
        }
        $this->_out($kids . ']');
        $this->_out('/Count ' . $this->_page);
        $this->_out(sprintf('/MediaBox [0 0 %.2f %.2f]', $this->_w, $this->_h));
        $this->_out('>>');
        $this->_out('endobj');
    }

    function _putStream($s) {
        $this->_out('stream');
        $this->_out($s);
        $this->_out('endstream');
    }

    function _putResources() {
        $this->_putFonts();
        $this->_offsets[2] = strlen($this->_buffer);
        $this->_out('2 0 obj');
        $this->_out('<</ProcSet [/PDF /Text]');
        $this->_out('/Font <<');
        foreach ($this->_fonts as $font) {
            $this->_out('/F' . $font['i'] . ' ' . $font['n'] . ' 0 R');
        }
        $this->_out('>>');
        $this->_out('>>');
        $this->_out('endobj');
    }

    function _putFonts() {
        foreach ($this->_fonts as $k => $font) {
            $this->_newobj();
            $this->_fonts[$k]['n'] = $this->_n;
            $name = $font['name'];
            $this->_out('<</Type /Font');
            $this->_out('/BaseFont /' . $name);
            $this->_out('/Subtype /Type1');
            if ($name != 'Symbol' && $name != 'ZapfDingbats') {
                $this->_out('/Encoding /WinAnsiEncoding');
            }
            $this->_out('>>');
            $this->_out('endobj');
        }
    }

    function output($filename) {
        if ($this->_state < 3) {
            $this->close();
        }

        if (headers_sent()) {
            die('Unable to send PDF file, some data has already been output to browser.');
        }

        if (isset($_SERVER['HTTP_USER_AGENT']))
            $agent = trim($_SERVER['HTTP_USER_AGENT']);
        else
            $agent = '';
        if ((preg_match('|MSIE ([0-9.]+)|', $agent, $version)) ||
                (preg_match('|Internet Explorer/([0-9.]+)|', $agent, $version))) {
            //header('Content-Type: application/x-msdownload');
            header('Content-Length: ' . strlen($this->_buffer));
            //if ($version == '5.5')
            //{
            //    header('Content-Disposition: filename="'.$filename.'"');
            //}
            //else
            //{
            //    header('Content-Disposition: attachment; filename="' .$filename.'"');
            //}
        } else {
            //header('Content-Type: application/pdf');
            header('Content-Length: ' . strlen($this->_buffer));
            //header('Content-disposition: attachment; filename='.$filename);
        }
        if ($this->_convert_encoding) $this->_buffer = iconv($this->_convert_from, $this->_convert_to, $this->_buffer);
        echo $this->_buffer;
    }

}
?>