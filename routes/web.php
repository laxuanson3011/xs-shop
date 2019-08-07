<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin
//route get login   
Route::get('admin/login','pageadminController@getlogin')->name('login');
//route post login
Route::post('admin/login','pageadminController@postlogin');
//route get logout
Route::get('admin/logout','pageadminController@getlogout')->name('logout');
// ,'middleware'=>'adminLogin'
Route::group(['prefix' => 'admin'], function () {
    // get trang chu cua admin
    //Route::get('trangchu','pageadminController@getIndex')->name('admin.trangchu');
    //Route::get('trangchu', function () {
      //  return view('admin.trangchu');
    //})->name('admin.trangchu');

    //danh muc 
    Route::group(['prefix' => 'danhmuc'], function () {
        //get danh sach
        Route::get('danhsach','danhmucController@getdanhsach')->name('danhmuc.danhsach');
        //route thêm get
        Route::get('them','danhmucController@getthem')->name('danhmuc.them');
        //route thêm post
        Route::post('them','danhmucController@postthem');
        //route sửa get 
        Route::get('sua/{id}','danhmucController@getsua')->name('danhmuc.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','danhmucController@postsua');
        //xoa
        Route::get('xoa/{id}','danhmucController@getxoa')->name('danhmuc.xoa');
    });
    //gioi thieu
    Route::group(['prefix' => 'gioithieu'], function () {
        //get danh sach
        Route::get('danhsach','gioithieuController@getdanhsach')->name('gioithieu.danhsach');
        //route thêm get
        Route::get('them','gioithieuController@getthem')->name('gioithieu.them');
        //route thêm post
        Route::post('them','gioithieuController@postthem');
        //route sửa get 
        Route::get('sua/{id}','gioithieuController@getsua')->name('gioithieu.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','gioithieuController@postsua');
        //xoa
        Route::get('xoa/{id}','gioithieuController@getxoa')->name('gioithieu.xoa');
    });
    //ship
    Route::group(['prefix' => 'ship'], function () {
        //get danh sach
        Route::get('danhsach','shipController@getdanhsach')->name('ship.danhsach');
        //route thêm get
        Route::get('them','shipController@getthem')->name('ship.them');
        //route thêm post
        Route::post('them','shipController@postthem');
        //route sửa get 
        Route::get('sua/{id}','shipController@getsua')->name('ship.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','shipController@postsua');
        //xoa
        Route::get('xoa/{id}','shipController@getxoa')->name('ship.xoa');
    });
    //hinh thuc thanh toan
    Route::group(['prefix' => 'hinhthucthanhtoan'], function () {
        //get danh sach
        Route::get('danhsach','hinhthucthanhtoanController@getdanhsach')->name('hinhthucthanhtoan.danhsach');
        //route thêm get
        Route::get('them','hinhthucthanhtoanController@getthem')->name('hinhthucthanhtoan.them');
        //route thêm post
        Route::post('them','hinhthucthanhtoanController@postthem');
        //route sửa get 
        Route::get('sua/{id}','hinhthucthanhtoanController@getsua')->name('hinhthucthanhtoan.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','hinhthucthanhtoanController@postsua');
        //xoa
        Route::get('xoa/{id}','hinhthucthanhtoanController@getxoa')->name('hinhthucthanhtoan.xoa');
    });
    //hang san xuat
    Route::group(['prefix' => 'hangsanxuat'], function () {
        //get danh sach
        Route::get('danhsach','hangsanxuatController@getdanhsach')->name('hangsanxuat.danhsach');
        //route thêm get
        Route::get('them','hangsanxuatController@getthem')->name('hangsanxuat.them');
        //route thêm post
        Route::post('them','hangsanxuatController@postthem');
        //route sửa get 
        Route::get('sua/{id}','hangsanxuatController@getsua')->name('hangsanxuat.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','hangsanxuatController@postsua');
        //xoa
        Route::get('xoa/{id}','hangsanxuatController@getxoa')->name('hangsanxuat.xoa');
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('hangsanxuat/{iddanhmuc}','AjaxController@gethangsanxuat');
        Route::get('sanpham/{iddanhmuc}','AjaxController@getsanpham')->name('ajax.sanpham');
    });
    //san pham
    Route::group(['prefix' => 'sanpham'], function () {
        //get danh sach
        Route::get('danhsach','sanphamController@getdanhsach')->name('sanpham.danhsach');
        //route thêm get
        Route::get('them','sanphamController@getthem')->name('sanpham.them');
        //route thêm post
        Route::post('them','sanphamController@postthem');
        //route sửa get 
        Route::get('sua/{id}','sanphamController@getsua')->name('sanpham.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','sanphamController@postsua');
        //xoa
        Route::get('xoa/{id}','sanphamController@getxoa')->name('sanpham.xoa');
    });
    //thong so ky thuat
    Route::group(['prefix' => 'thongsokythuat'], function () {
        //get danh sach
        Route::get('danhsach','thongsokythuatController@getdanhsach')->name('thongsokythuat.danhsach');
        //route thêm get
        Route::get('them','thongsokythuatController@getthem')->name('thongsokythuat.them');
        //route thêm post
        Route::post('them','thongsokythuatController@postthem');
        //route sửa get 
        Route::get('sua/{id}/{idsanpham}','thongsokythuatController@getsua')->name('thongsokythuat.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}/{idsanpham}','thongsokythuatController@postsua');
        //xoa
        Route::get('xoa/{id}','thongsokythuatController@getxoa')->name('thongsokythuat.xoa');
    });
    //tin tuc khuyen mai
    Route::group(['prefix' => 'tintuckhuyenmai'], function () {
        //get danh sach
        Route::get('danhsach','tintuckhuyenmaiController@getdanhsach')->name('tintuckhuyenmai.danhsach');
        //route thêm get
        Route::get('them','tintuckhuyenmaiController@getthem')->name('tintuckhuyenmai.them');
        //route thêm post
        Route::post('them','tintuckhuyenmaiController@postthem');
        //route sửa get 
        Route::get('sua/{id}/{idsanpham}','tintuckhuyenmaiController@getsua')->name('tintuckhuyenmai.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}/{idsanpham}','tintuckhuyenmaiController@postsua');
        //xoa
        Route::get('xoa/{id}','tintuckhuyenmaiController@getxoa')->name('tintuckhuyenmai.xoa');
    });
    
    Route::group(['prefix' => 'slide'], function () {
        //get danh sach
        Route::get('danhsach','slideController@getdanhsach')->name('slide.danhsach');
        //route thêm get
        Route::get('them','slideController@getthem')->name('slide.them');
        //route thêm post
        Route::post('them','slideController@postthem');
        //route sửa get 
        Route::get('sua/{id}','slideController@getsua')->name('slide.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','slideController@postsua');
        //xoa
        Route::get('xoa/{id}','slideController@getxoa')->name('slide.xoa');
    });
    Route::group(['prefix' => 'users'], function () {
        //get danh sach
        Route::get('danhsach','usersController@getdanhsach')->name('users.danhsach');
        //route thêm get
        Route::get('them','usersController@getthem')->name('users.them');
        //route thêm post
        Route::post('them','usersController@postthem');
        //route sửa get 
        Route::get('sua/{id}','usersController@getsua')->name('users.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}','usersController@postsua');
        //xoa
        Route::get('xoa/{id}','usersController@getxoa')->name('users.xoa');
    });
    Route::group(['prefix'=>'binhluan'],function(){
        //route xóa get
        Route::get('xoa/{id}/{idsanpham}','binhluanController@getxoa')->name('binhluan.xoa');
    });
    Route::group(['prefix'=>'hoadon'],function(){
        //get danh sach
        Route::get('danhsach','hoadonController@getdanhsach')->name('hoadon.danhsach');
        //route sửa get 
        Route::get('sua/{id}/{idusers}/{idsanpham}','hoadonController@getsua')->name('hoadon.sua');//truyền vào id để biết sữa thể loại nào 
        //route sửa post
        Route::post('sua/{id}/{idusers}/{idsanpham}','hoadonController@postsua');
        //route xóa get
        Route::get('xoa/{id}/{idusers}','hoadonController@getxoa')->name('hoadon.xoa');
    });
});
//pages 
Route::group(['prefix' => 'page'], function () {
    //trang chu
    Route::get('trangchu', 'pagesController@trangchu')->name('page.trangchu');
    //gioithieu
    Route::get('gioithieu', 'pagesController@gioithieu')->name('page.gioithieu');
    //lienhe
    Route::get('lienhe', 'pagesController@lienhe')->name('page.lienhe');
    //hang san xuat
    Route::get('hangsanxuat/{id}', 'pagesController@hangsanxuat')->name('page.hangsanxuat');
    //tin tuc khuyen mai
    Route::get('tintuckhuyenmai', 'pagesController@tintuckhuyenmai')->name('page.tintuckhuyenmai');
    // chi tiet tin tuc khuyen mai
    Route::get('chitiettintuckhuyenmai/{id}/{idsanpham}', 'pagesController@chitiettintuckhuyenmai')->name('page.chitiettintuckhuyenmai');
    //chi tiet san pham
    Route::get('chitietsanpham/{id}', 'pagesController@chitietsanpham')->name('page.chitietsanpham');

    //chi tiet gio hang
    Route::get('giohang', 'pagesController@getcart')->name('page.giohang');
    // cong viec gio hang
    Route::get('giohang/addcart/{id}', 'pagesController@addcart')->name('page.giohang.them');
    Route::get('giohang/update/{id}/{qty}-{dk}','pagesController@getupdatecart')->name('page.giohang.capnhat');
    Route::get('giohang/delete/{id}','pagesController@getdeletecart')->name('page.giohang.xoa');
    Route::get('giohang/xoa', 'pagesController@xoa')->name('page.xoa');

    // tien hanh dat hang
    Route::group(['prefix' => 'dathang','middleware'=>'DatHangLogin'], function () {
        Route::get('dathang', 'pagesController@getdathang')->name('page.dathang');
        Route::post('dathang', 'pagesController@postdathang');    
    });
    //binh luan    
    Route::post('binhluan/{id}','binhluanController@postbinhluan');
    //login 
    Route::get('login', 'pagesController@getlogin')->name('page.login');
    Route::post('login', 'pagesController@postlogin');
    //sigin

    //logout
    Route::get('logout','pagesController@getlogout')->name('page.logout');
});
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');


