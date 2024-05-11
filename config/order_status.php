<?php

return [

    'order_status_admin' => [
        'pending' => [
            'status' => 'Đang chờ xử lý',
            'details' => 'Đơn hàng của bạn đang chờ xử lý'
        ],
        'processed_and_ready_to_ship' => [
            'status' => 'Đang chuẩn bị hàng',
            'details' => 'Người bán đang chuẩn bị hàng '
        ],
        'dropped_off' => [
            'status' => 'Đơn vị vận chuyển lấy hàng thành công',
            'details' => 'Đơn vị vận chuyển lấy hàng thành công'
        ],
        'shipped' => [
            'status' => 'Shipped',
            'details' => 'Đang vận chuyển'
        ],
        'out_for_delivery' => [
            'status' => 'Chuẩn bị giao',
            'details' => 'Chuẩn bị giao'
        ],
        'delivered' => [
            'status' => 'Đã giao hàng',
            'details' => 'Đã giao hàng'
        ],
        'canceled' => [
            'status' => 'Đã hủy',
            'details' => 'Đã hủy'
        ]

    ],

];
