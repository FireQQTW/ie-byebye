<?php

class RunDataTableSeeder extends Seeder {

	public function run()
	{
        // test data 1
        $landlord_id = DB::table('landlords')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'username'  =>  'landlord1',
            'password'  =>  Hash::make('landlord1'),
            'name'  =>  '房東1',
            'zipcode'   =>  '403',
            'county'    =>  '台中市',
            'district'  =>  '西區',
            'address'   =>  '美村路一段1號',
            'isEnabled' =>  true
        ));

        $house_id = DB::table('houses')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'landlord_id'   =>  $landlord_id,
            'zipcode'   =>  '403',
            'county'    =>  '台中市',
            'district'  =>  '西區',
            'address'   =>  '美村路一段2號'
        ));

        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room1-1',
            'password'  =>  Hash::make('room1-1'),
            'name'  =>  '房客1-1',
            'billed'    =>  3000,
            'isEnabled' =>   true
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0001',
            'ip'    =>  '192.168.0.1',
            'use_w' =>  3000,
            'last_w'    =>  1500,
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));


        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room1-2',
            'password'  =>  Hash::make('room1-2'),
            'name'  =>  '房客1-2',
            'billed'    =>  1000,
            'isEnabled' =>   true
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0002',
            'ip'    =>  '192.168.0.0',
            'use_w' =>  1500,
            'last_w'    =>  500,
            'isEnabled' =>  false,
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));
		
        $house_id = DB::table('houses')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'landlord_id'   =>  $landlord_id,
            'zipcode'   =>  '403',
            'county'    =>  '台中市',
            'district'  =>  '西區',
            'address'   =>  '美村路一段3號'
        ));

        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room2-1',
            'password'  =>  Hash::make('room2-1'),
            'name'  =>  '房客2-1',
            'billed'    =>  0,
            'isEnabled' =>   true
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0003',
            'ip'    =>  '192.168.0.3',
            'use_minute' =>  3000,
            'last_minute'    =>  1500,
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));

        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room2-2',
            'password'  =>  Hash::make('room2-2'),
            'name'  =>  '房客2-2',
            'billed'    =>  1000,
            'isEnabled' =>   false
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0004',
            'ip'    =>  '192.168.0.4',
            'use_w' =>  3000,
            'last_w'    =>  1500,
            'mu_v'  =>  152.2,
            'mu_a'  =>  '9.8',
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));

        $house_id = DB::table('houses')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'landlord_id'   =>  $landlord_id,
            'zipcode'   =>  '403',
            'county'    =>  '台中市',
            'district'  =>  '西區',
            'address'   =>  '美村路一段4號'
        ));

        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room3-1',
            'password'  =>  Hash::make('room3-1'),
            'name'  =>  '房客3-1',
            'billed'    =>  0,
            'isEnabled' =>   true
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0005',
            'ip'    =>  '192.168.0.5',
            'use_minute' =>  3000,
            'last_minute'    =>  1500,
            'mu_v'  =>  152.2,
            'mu_a'  =>  '9.8',
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));


        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room3-2',
            'password'  =>  Hash::make('room3-2'),
            'name'  =>  '房客2-2',
            'billed'    =>  1000,
            'isEnabled' =>   false
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0006',
            'ip'    =>  '192.168.0.6',
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));

        // test data 2
        $landlord_id = DB::table('landlords')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'username'  =>  'landlord2',
            'password'  =>  Hash::make('landlord2'),
            'name'  =>  '房東2',
            'zipcode'   =>  '403',
            'county'    =>  '台中市',
            'district'  =>  '西區',
            'address'   =>  '美村路二段1號',
            'isEnabled' =>  true
        ));

        $house_id = DB::table('houses')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'landlord_id'   =>  $landlord_id,
            'zipcode'   =>  '403',
            'county'    =>  '台中市',
            'district'  =>  '西區',
            'address'   =>  '美村路二段2號'
        ));

        $room_id = DB::table('rooms')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'house_id'  =>  $house_id,
            'username'  =>  'room4-1',
            'password'  =>  Hash::make('room4-1'),
            'name'  =>  '房客1-1',
            'billed'    =>  3000,
            'isEnabled' =>   true
        ));

        DB::table('pmus')->insertGetId(array(
            'sn'    =>  md5(uniqid()),
            'room_id' =>    $room_id,
            'name'  =>  'A0007',
            'ip'    =>  '192.168.0.7',
            'use_w' =>  3000,
            'last_w'    =>  1500,
            'mu_dt' =>  date("Y-m-d H:i:s")
        ));

	}

}
