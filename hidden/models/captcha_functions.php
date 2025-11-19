<?php

// *****************************************************************************

define("IMAGE_PATH", "images/temp/");
define("IMAGE_NAME", "captcha_");
define("IMAGE_EXT", ".png");

define("FONT_FILE", "fonts/Marcellus-Regular.ttf");

define ("IMAGE_SIZE", serialize( array(250, 60) ));

define ("COLOR_BG", serialize( array(153, 153, 153) ));
define ("COLOR_T1", serialize( array(200, 200, 200) ));
define ("COLOR_T2", serialize( array(153, 0, 0) ));

define ("LINES_COUNT", 6);
define ("DOTS_COUNT", 100);

define ("ALL_CHARS", 'abcdefghijklmnopqrstvwxyz234567892345678923456789');

define ("TEXT_SIZE_T1", 30);
define ("TEXT_SIZE_T2", 26);

define ("TEXT_WOBBLE_T1", 20);
define ("TEXT_WOBBLE_T2", 30);

define ("CAPTCHA_LEN", 5);

define ("PADDING_LEFT", 15);
define ("PADDING_TOP", 15);
define ("PADDING_CHAR", 15);

// *****************************************************************************

// Generate Random Captcha-String
function gen_captcha_str() {
    // get all letters
    $signs = ALL_CHARS;
    // count allowed letters
    $buffer_len = strlen(ALL_CHARS);
    // captcha_str
    $captcha_str = '';
    // gen captcha str with given length
    //for($i = 1; $i <= $len; $i++) {
    for($i = 1; $i <= CAPTCHA_LEN; $i++) {
        // random letter from buffer
        $sign = $signs{rand(0, $buffer_len-1)};
        // add new letter to code str
        $captcha_str .= $sign;
    }
    // return the generated captcha string
    return $captcha_str;
}

// *****************************************************************************

// Fill image with color_bg
function render_background($image, $size, $color) {
    $bg_color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
    imagefilledrectangle($image, 0, 0, $size[0], $size[1], $bg_color);
}

// Render Random Lines
function render_lines($image, $size, $color, $count) {
    $line_color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
    for($i=0; $i < $count; $i++) {
        imageline($image, 0, rand()%50, $size[0], rand()%$size[1], $line_color);
    }
}

// Render Random Dots
function render_dots($image, $size, $color, $count) {
    $pixel_color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
    for($i=0; $i < $count; $i++) {
        imagesetpixel($image, rand()%$size[0], rand()%$size[1], $pixel_color);
    }
}

// Render Random TTF-Text with wobble from string
function render_text($image, $wobble, $color, $font_size, $string) {
    // gen font color from array
    $font_color = imagecolorallocate($image, $color[0], $color[1], $color[2]);
    // image.padding-left
    $pad_left = PADDING_LEFT;
    // image.padding-top
    $pad_top = PADDING_TOP;
    // image.padding-char
    $pad_char = PADDING_CHAR;
    // Render captcha string to image (as per letter)
    for($i = 1; $i <= CAPTCHA_LEN; $i++) {
        // Image-Handle, Font-size, Angle, X, Y, Color, Font_File, String
        imagettftext($image, $font_size, rand(-$wobble, $wobble), $pad_left + (($i == 1?$pad_char:$pad_char*2) * $i), $pad_top+$font_size, $font_color, FONT_FILE, $string{$i-1});
    }
}

// *****************************************************************************

// Generate captcha
function generate_custom_captcha($_SESSIONNAME) {
    
    // die on empty session_name
    if (trim($_SESSIONNAME) == '') {
        die('There is no session name, doh!'); 
    } 
    // get extra part for image_filename 
    $img_name_extra = $_SESSION['extra'];
    // get  all CONSTANTS to local vars
    $img_path = IMAGE_PATH;
    $img_name = IMAGE_NAME;
    $img_ext = IMAGE_EXT;
    $img_size = unserialize(IMAGE_SIZE);
    $color_bg = unserialize(COLOR_BG);
    $color_t1 = unserialize(COLOR_T1);
    $color_t2 = unserialize(COLOR_T2);
    $text_t1 = TEXT_SIZE_T1;
    $text_t2 = TEXT_SIZE_T2;
    $wobble_t1 = TEXT_WOBBLE_T1;
    $wobble_t2 = TEXT_WOBBLE_T2;
    $lines_count = LINES_COUNT;
    $dots_count = DOTS_COUNT;
    
    // ---------------------------- render: start  -----------------------------
    // gen captcha_str
    $captcha_str = gen_captcha_str();
    // create image (in memory)
    $image = imagecreatetruecolor($img_size[0], $img_size[1]);
    // fill image bg
    render_background($image, $img_size, $color_bg);
    
    // ---------------------------- render: take 1 -----------------------------
    // render text
    render_text($image, $wobble_t1, $color_t1, $text_t1, $captcha_str); 
    // generate lines
    render_lines($image, $img_size, $color_t1, $lines_count);
    // generate dots
    render_dots($image, $img_size, $color_t1, $dots_count);

    // ---------------------------- render: take 2 -----------------------------
    // render text
    render_text($image, $wobble_t2, $color_t2, $text_t2, $captcha_str); 
    // generate lines
    render_lines($image, $img_size, $color_t2, $lines_count);
    // generate dots
    render_dots($image, $img_size, $color_t2, $dots_count);
    
    // ---------------------------- render: stop   -----------------------------

    // Save Captcha-Code to Session string
    $_SESSION[$_SESSIONNAME] = $captcha_str; 
    
    // find old capcha files in image path
    $old_images = glob($img_path . '*' . $img_ext);
    // delete all old capcha files from $old_images
    foreach ($old_images as $image_to_delete) {
        unlink($image_to_delete);
    }

    // render image_fullname with newname(date()) from session array
    $image_fullname = $img_path . $img_name . $img_name_extra . $img_ext;
    // save new rendered captcha-image
    imagepng($image, $image_fullname);
    // free memory ($image)
    imagedestroy($image);
}

// *****************************************************************************

// display refresh form

function display_refresh_form() {
    $echo_str =  "                                <button class='refresh_bttn button' name='refresh' type='submit' method='post'>\n";
    $echo_str .= "                                    <span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>\n";
    $echo_str .= "                                </button>\n";
    echo $echo_str;
}

// display success message
function display_success($message_text) {
    $echo_str = '<p>';
    $echo_str .= $message_text;
    $echo_str .= '</p>';
    echo $echo_str;
}

// display captcha form
function display_captcha_form($submit_text) {
    $echo_str = "<img class='captcha_img' src='" . IMAGE_PATH . IMAGE_NAME . $_SESSION["extra"] . IMAGE_EXT . "'>\n";
    $echo_str .= "                                <span class='captcha_inf messagespan'>Bitte nebenstehende Zeichen eingeben</span>\n";
    $echo_str .= "                                <span class='captcha_inf robot'>This is just to check if you are a robot</span>\n";
    $echo_str .= "                                <input id='captcha_inp' type='text' name='input' placeholder='Zeichen'/>\n";
    $echo_str .= "                                <input class='sent_bttn button' type='submit' name='contactSubmit' value='".$submit_text."'/>\n";
    $echo_str .= "                                <noscript><button class='sent_bttn button' name='contactSubmit' type='submit'>abseanden</button></noscript>\n";
    $echo_str .= "                                <input type='hidden' name='message_submitted' value='1'/>\n";
    $echo_str .= "                                <input type='hidden' name='flag' value='1'/>\n";
    echo $echo_str;
}