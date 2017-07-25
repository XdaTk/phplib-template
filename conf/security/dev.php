<?php
return array(
    'aes' => array(
        'common'  => array(
            'method'    => 'aes128',
            'password'  => 'jk23jbsdfi23hhj1',
            'iv'        => 'j12hj34jhg123khj',
            'options'   =>  0,
        ),
        'db'  => array(
            'method'    => 'aes256',
            'password'  => '07a74d861fc5a15b0ceced74b66e24ce',
            'iv'        => '6f6e9a4f4c87dfd4',
            'options'   => OPENSSL_RAW_DATA,
        ),
        'ots'  => array(
            'method'    => 'aes256',
            'password'  => '198503695fee87e30de926b59078ee77',
            'iv'        => '3ba4030c63715406',
            'options'   => OPENSSL_RAW_DATA,
        ),
    ),
    // 内网服务调用安全校验配置
    'app' => array(
        APP_NAME => array(
            'secret' => '30ad3a3a1d2c7c63102e09e6fe4bb253',
        ),
    ),
    'des' => array(
        'common'  => array(
            'method'    => 'DES-ECB',
            'password'  => '12asld12lkjsdf1s',
            'options'   => 0,
        ),
    ),
    'rsa' => array(
        'common'  => array(
            'public_key'    =>
                '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDfHkZeFz+vYlt63SxZAjasxaTH
RfIhhBCTa46eSUUGm6JtfVyHtEsMGyhqKu5CK9JdTimEwdtcBQER+gjWqF8LbVT2
m6ONv8UvjYvbl8GCJOA13WiompbYiGria2wdpxlzOyfpuxBimh7sKz8CZ2gHvxwS
J2bd25wvJJHhFq4OHwIDAQAB
-----END PUBLIC KEY-----
',
            'private_key'   =>
                '-----BEGIN RSA PRIVATE KEY-----
MIICWwIBAAKBgQDfHkZeFz+vYlt63SxZAjasxaTHRfIhhBCTa46eSUUGm6JtfVyH
tEsMGyhqKu5CK9JdTimEwdtcBQER+gjWqF8LbVT2m6ONv8UvjYvbl8GCJOA13Wio
mpbYiGria2wdpxlzOyfpuxBimh7sKz8CZ2gHvxwSJ2bd25wvJJHhFq4OHwIDAQAB
AoGAPDU6Pee+KsC6+OO4NOixAlxvQ8rvNPYjVvS+Tp5s/wR+h1c94ezYF5M4i7W8
B6U1pjISaB276Q/8ovI68loLE1RXZbyTSNuiZIRs+JB22OkanBHH00W39UkoP2vy
CkFaIAvZUPcxRQqScHRDp/BPz8i+hSRPEiFkdceh8hLJR3kCQQDwk5GcdIn+VHQd
4mR9MNBmowP12zz5ujxYwFniu572aApEPc0Y1oBtl/na2/CbPPxdXGSHjcKC2xmG
fdYiIu4dAkEA7WwtBTDRXg/nLxRaUfFT3rM9kO6qls/5D0MclkZ5HIfCE4q4f73w
xH+5DZSsnStvFNJAgp5uW3PekM7lumAoawJAZZr9saVqrpa+n+yA4nreWarZvlmE
7Dfiyt0aWW9CWPFh/KZZW/ckMKUyKmQfv4DHWSrvbmzJzPh6VFoLOUmlZQJARAcM
10Hnm4X+/bRdNMFrAJJm/5IC+vdYK5FVLZG/vfcAGs1Sk/d+dy8JfOSumNILH/Im
Xca7ZCTNDrzZgg9vRQJAUFOEj562mi10TNIXwodEjutPFjGBQBo1063w1euOrZ8R
5AMs4dSPRTBc0rcziziOEaK5LzfdbL1oO3Vy3XreeA==
-----END RSA PRIVATE KEY-----
',
        ),
    ),
);