<?php 

$content = 

array(
    'advertiser' => array(
        'name'      => 'advertiser',
        'title'     => '广告主模块',
        'interface' => array(
            'signup' => array(
                'name'    => 'signup',
                'title'   => '广告主注册',
                'method'  => 'POST',
                'request' => array(
                    // string
                    'customer_registration_type' => array(
                        'extendType'  => 'customer_registration_type',
                        'require'     => 'no',
                        'type'        => 'string',
                        'description' => '广告主类型',
                        'restraint'   => "见 [link href='customer_registration_type']广告主类型定义[/link]",
                        'errormsg'    => '广告主类型不正确',
                        'max_length'  => '90',
                        'min_length'  => '1',
                        'list'        => 'TARGETTYPE_OPEN_PLATFORM_APP,TARGETTYPE_BRAND',
                        'pattern'     => '{url_pattern}',   
                        'enum'        => 'enum',
                        'source'      => 'api_CreativeSelectionType'
                    ),
                    // integer
                    'login_name' => array(
                        'extendType'  => 'login_name',
                        'require'     => 'no',
                        'type'        => 'integer',
                        'description' => '登录名',
                        'restraint'   => '小于42亿',
                        'errormsg'    => '登录名不正确',
                        'max'         => '4294967295',
                        'min'         => '10000'
                    ),
                    // id / number
                    'campaign_id' => array(
                        'extendType'  => 'campaign_id',
                        'require'     => 'no',
                        'type'        => 'id',
                        'description' => '推广计划Id',
                        'restraint'   => '小于2^63',
                        'errormsg'    => '推广计划Id不正确',
                        'max'         => '2^63',
                        'min'         => '1',
                    ),
                    // struct
                    'conf' => array(
                        'extendType'  => 'conf',
                        'require'     => 'yes',
                        'type'        => 'struct',
                        'description' => '分页配置信息',
                        'restraint'   => '',
                        'errormsg'    => '分页配置信息不正确',
                        'element'     => array(
                            'name' => array(
                                'name'       => $name,
                                'extendType' => $extendType,
                                'require'    => $require
                            )
                        )
                    ),
                    // array
                    'location' => array(
                        'extendType'      => 'location',
                        'require'         => 'no',
                        'type'            => 'array',
                        'description'     => '广告主类型',
                        'restraint'       => "见 [link href='']广告主类型定义[/link]",
                        'errormsg'        => '广告主类型不正确',
                        'list'            => 'date,adgroup_id',
                        'pattern'         => 'pattern',
                        'max_size'        => '90',
                        'min_size'        => '1',
                        'item_max_length' => '1',
                        'repeated'        => array(

                        )
                    )
                )
            )
        )
    )
);