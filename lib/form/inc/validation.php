<?php

function validation($data) {
    $error = [];
    // if (empty($data['fullname'])) {
    //     $error['fullname'] = '入力必須です';
    // }
    // if (empty($data['email'])) {
    //     $error['email'] = '入力必須です';
    // } elseif (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
    //     $error['email_format'] = '正しいメールアドレスで入力してください';
    // }
    // if (empty($data['tel'])) {
    //     $error['tel'] = '入力必須です';
    // } elseif (!preg_match('/^(0[5-9]0[-(]?[0-9]{4}[-)]?[0-9]{4}|0120[-]?\d{1,3}[-]?\d{4}|050[-]?\d{4}[-]?\d{4}|0[1-9][-]?\d{1,4}[-]?\d{1,4}[-]?\d{4})*$/', $data['tel'])) {
    //     $error['tel_format'] = '正しい電話番号で入力してください';
    // }
    // if (empty($data['message'])) {
    //     $error['message'] = '入力必須です';
    // }
    // if (empty($data['agree'])) {
    //     $error['agree'] = '同意してください';
    // }
    return $error;
}