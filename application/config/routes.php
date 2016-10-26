<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "index";
// $route['404_override'] = 'index/nopage';


/* Routes for end user side by siva*/

$route['products_view'] = 'index/products_list';
$route['product_details/(:any)'] = 'index/product_details/$1';
$route['recipient_category/(:any)'] = 'index/recipient_category/$1';
$route['about_us'] = 'index/about_details';
$route['contact_us'] = 'index/contact_details';
$route['glogin'] = 'index/glogin';

/* Routes for end user side by vel*/

$route['account'] = 'index/account';
$route['cart'] = 'index/cart';
$route['checkout_0'] = 'index/checkout_0';
$route['checkout_1'] = 'index/checkout_1';
$route['checkout_2'] = 'index/checkout_2';
$route['checkout_3'] = 'index/checkout_3';
$route['checkout_4'] = 'index/checkout_4';
$route['checkout_5'] = 'index/checkout_5';
$route['forgot_password'] = 'index/forgot_password';
$route['form'] = 'index/form';
$route['error_page'] = 'index/error_page';
$route['add_address'] = 'index/add_address';
$route['login'] = 'index/login';
$route['my_address'] = 'index/my_address';
$route['order_list'] = 'index/order_list';
$route['order_status'] = 'index/order_status';
$route['thanks_for_order'] = 'index/thanks_for_order';
$route['user_information'] = 'index/user_information';
$route['welcome_message'] = 'index/welcome_message';
$route['wishlist'] = 'index/wishlist';
$route['portfolio'] = 'index/portfolio';
$route['pre_wedding'] = 'index/pre_wedding';
$route['post_wedding'] = 'index/post_wedding';
$route['track_order'] = 'index/track_order';

//Route url for admin
$route['admin'] = 'admin/login/index_login';
$route['users/adminusers'] = 'users/adminusers';
$route['users/add_adminusers'] = 'users/add_adminusers';
$route['users/edit_adminusers'] = 'users/edit_adminusers';
$route['adminindex/endusers'] = 'adminindex/endusers';
$route['adminindex/edit_endusers'] = 'adminindex/edit_endusers';
$route['admin/logout'] = 'admin/login/logout';
$route['admin/dashboard'] = 'admin/adminindex/dashboard';
$route['admin/delete'] = 'admin/adminindex/delete';
$route['adminindex/category'] = 'adminindex/category';
$route['adminindex/add_category'] = 'adminindex/add_category';
$route['adminindex/edit_category/(:any)'] = 'adminindex/edit_category';

$route['adminindex/subcategory'] = 'adminindex/subcategory';
$route['adminindex/add_subcategory'] = 'adminindex/add_subcategory';
$route['adminindex/edit_subcategory/(:any)'] = 'adminindex/edit_subcategory';
$route['adminindex/recipient'] = 'adminindex/recipient';
$route['adminindex/add_recipient'] = 'adminindex/add_recipient';
$route['adminindex/edit_recipient'] = 'adminindex/edit_recipient';
$route['adminindex/giftproduct'] = 'adminindex/giftproduct';
$route['adminindex/add_product'] = 'adminindex/add_product';
$route['adminindex/edit_giftproduct'] = 'adminindex/edit_giftproduct';
$route['adminindex/product_attributes'] = 'adminindex/product_attributes';
$route['adminindex/add_product_attributes'] = 'adminindex/add_product_attributes';
$route['adminindex/edit_product_attributes/(:any)'] = 'adminindex/edit_product_attributes';
$route['adminindex/loadcategory_reference'] = 'adminindex/loadcategory_reference';
$route['adminindex/product_attribute_sets'] = 'adminindex/product_attribute_sets';
// $route['adminindex/delete/(:any)/(:any)'] = 'adminindex/delete';
$route['photography/photoshoot_type'] = 'photography/photoshoot_type';
$route['photography/add_photoshoot_type'] = 'photography/add_photoshoot_type';
$route['photography/edit_photoshoot_type/(:any)'] = 'photography/edit_photoshoot_type';
$route['photography/photoshoot_person_detail'] = 'photography/photoshoot_person_detail';
$route['photography/add_photoshoot_person_detail'] = 'photography/add_photoshoot_person_detail';
$route['photography/edit_photoshoot_person_detail/(:any)'] = 'photography/edit_photoshoot_person_detail';


$route['adminindex/area'] = 'adminindex/area';
$route['adminindex/add_area'] = 'adminindex/add_area';
$route['adminindex/edit_area'] = 'adminindex/edit_area';
$route['adminindex/city'] = 'adminindex/city';
$route['adminindex/add_city'] = 'adminindex/add_city';
$route['adminindex/edit_city'] = 'adminindex/edit_city';

$route['adminindex/state'] = 'adminindex/state';
$route['adminindex/add_state'] = 'adminindex/add_state';
$route['adminindex/edit_state'] = 'adminindex/edit_state';

$route['adminindex/order'] = 'adminindex/order';
$route['adminindex/edit_order'] = 'adminindex/edit_order';
$route['adminindex/orderitem'] = 'adminindex/orderitem';
$route['adminindex/edit_orderitem'] = 'adminindex/edit_orderitem';
$route['adminindex/edit_transaction'] = 'adminindex/edit_transaction';
// $route['adminindex/admin_404'] = 'admin/adminindex/admin_nopage';
$route['admin/admin_404'] = 'admin/adminindex/admin_nopage';



/* End of file routes.php */
/* Location: ./application/config/routes.php */