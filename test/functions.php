<?php

function load_form_register(){
    $html_form='<form action="controller.php" name="frm_register">';
    $html_form.='<label for="user_names"><b>User Name</b></label><input type="text" placeholder="Enter User Name" name="user_names" id="user_names" required><br/>';
    $html_form.='<label for="full_names"><b>Full Name</b></label><input type="text" placeholder="Enter Full Name" name="full_names" id="full_names" required><br/>';
    $html_form.='<label for="email"><b>Email</b></label><input type="text" placeholder="Enter Email" name="email" id="email" required><br/>';
    $html_form.='<label for="psw"><b>Password</b></label><input type="password" placeholder="Enter Password" name="psw" id="psw" required><br/>';
    $html_form.='<input type="hidden" name="frm_register" value="frm_register">';
    $html_form.='<button type="submit" class="registerbtn">Register</button>';
    $html_form.='</form>';
    return $html_form;
}

function login_form(){
    $html_form='<form action="controller.php" name="frm_login">';
    $html_form.='<label for="user_names"><b>User Name</b></label><input type="text" placeholder="Enter User Name" name="user_names" id="user_names" required><br/>';
    $html_form.='<label for="password"><b>Password</b></label><input type="text" placeholder="Enter password" name="psw" id="password" required><br/>';
    $html_form.='<button type="submit" class="registerbtn">Register</button>';
    $html_form.='<input type="hidden" name="frm_login" value="frm_login">';
    $html_form.='</form>';
    return $html_form;
}
?>