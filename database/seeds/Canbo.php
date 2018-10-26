<?php

use App\Models\CanBo\BoPhan;
use Illuminate\Database\Seeder;

class Canbo extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		BoPhan::create( [
			'name'  => 'Hiệu trưởng',
			'group' => 'Ban Giám hiệu'
		] );
		BoPhan::create( [
			'name'  => 'Phó Hiệu trưởng',
			'group' => 'Ban Giám hiệu'
		] );

		BoPhan::create( [
			'name'  => 'Đảng',
			'group' => 'Các tổ chức Chính trị'
		] );
		BoPhan::create( [
			'name'  => 'Công đoàn',
			'group' => 'Các tổ chức Chính trị'
		] );
		BoPhan::create( [
			'name'  => 'Đoàn TN CS HCM',
			'group' => 'Các tổ chức Chính trị'
		] );
		BoPhan::create( [
			'name'  => 'Hội Sinh viên',
			'group' => 'Các tổ chức Chính trị'
		] );

		BoPhan::create( [
			'name'  => 'Phòng TCCB',
			'group' => 'Các phòng chức năng'
		] );
		BoPhan::create( [
			'name'  => 'Phòng Tài vụ',
			'group' => 'Các phòng chức năng'
		] );
		BoPhan::create( [
			'name'  => 'Phòng K.thí&ĐBCLGD',
			'group' => 'Các phòng chức năng'
		] );
		BoPhan::create( [
			'name'  => 'Phòng Đào tạo',
			'group' => 'Các phòng chức năng'
		] );
		BoPhan::create( [
			'name'  => 'Phòng HC,TH',
			'group' => 'Các phòng chức năng'
		] );
		BoPhan::create( [
			'name'  => 'Phòng Quản trị',
			'group' => 'Các phòng chức năng'
		] );
		BoPhan::create( [
			'name'  => 'Phòng Công tác HSSV',
			'group' => 'Các phòng chức năng'
		] );

		BoPhan::create( [
			'name'  => 'Trung tâm ĐTVĐV',
			'group' => 'Các Viện, Trung tâm'
		] );
		BoPhan::create( [
			'name'  => 'Trung tâm TT,TV',
			'group' => 'Các Viện, Trung tâm'
		] );
		BoPhan::create( [
			'name'  => 'Trung tâm tin học, ngoại ngữ',
			'group' => 'Các Viện, Trung tâm'
		] );
		BoPhan::create( [
			'name'  => 'Trung tâm GDQP-AN',
			'group' => 'Các Viện, Trung tâm'
		] );
		BoPhan::create( [
			'name'  => 'Viện KH&CN TDTT',
			'group' => 'Các Viện, Trung tâm'
		] );
		BoPhan::create( [
			'name'  => 'Trường Phổ thông năng khiếu Olympic',
			'group' => 'Các Viện, Trung tâm'
		] );
		BoPhan::create( [
			'name'  => 'Trạm Y tế',
			'group' => 'Các Viện, Trung tâm'
		] );

		BoPhan::create( [
			'name'  => 'Khoa GDTC',
			'group' => 'Các khoa'
		] );
		BoPhan::create( [
			'name'  => 'Khoa Huấn luyện TT',
			'group' => 'Các khoa'
		] );
		BoPhan::create( [
			'name'  => 'Khoa Y học TDTT',
			'group' => 'Các khoa'
		] );
		BoPhan::create( [
			'name'  => 'Khoa Quản lý TDTT',
			'group' => 'Các khoa'
		] );
		BoPhan::create( [
			'name'  => 'Khoa tại chức',
			'group' => 'Các khoa'
		] );
		BoPhan::create( [
			'name'  => 'Khoa Sau đại học',
			'group' => 'Các khoa'
		] );

		BoPhan::create( [
			'name'  => 'Bộ môn LL đại cương',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Quản lý TDTT',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Bóng chuyền',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Điền kinh,Cử tạ',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Bóng đá, Đá cầu',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Lý luận TDTT',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Cầu Lông',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Y sinh học TDTT',
			'group' => 'Các Bộ môn'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Golf',
			'group' => 'Các khoa'
		] );
		BoPhan::create( [
			'name'  => 'Bộ môn Tâm lý giáo dục',
			'group' => 'Các khoa'
		] );
	}
}
