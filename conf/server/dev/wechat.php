<?php
/**
 * 微信服务配置
 *
 * 微信公众号名称在modules\Wechat\Bootstrap中定义, 存在多个公众号情况下注意区分
 */
return array(
    'demo' => array(
        'appid'            => '',
        'appsecret'        => '',
        'token'            => '',
        'encoding_aes_key' => '',

        // 微信支付使用
        'mch_id'           => '',
        'pay_key'          => '',
    ),
);