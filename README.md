# PHP - MVC FRAMEWORK
 - php web framework based on mvc model (model, view, controller)
# How to use
  1. Download and configure your web server to view only "/public" ("/public" must be enrty point of this framework)
  2. MVC Framework has routes <br>
    2.1 Routes is 'config/web/routes.php' <br>
   2.2 To make route write <code>Route::get('/',"Welcome@index")</code> <br>
     - First param will be url, first part of second param will be controller and second part will be method <br>
     - To return view write <code>return Base::View('Welcome')</code> <br>
  3. Controllers is php class with method & namespace <br>
  4. View is html php. <br>
