<?php

namespace App\Controllers;

use App\Models\OrderModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();

        $userId = session()->get('user_id');

        $data['orders'] = $orderModel
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('profile', $data);
    }
}