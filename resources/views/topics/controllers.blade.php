@extends('layouts.master')

@section('content')
<div class="container">
    <h3 class="header">Controllers</h3>
    <h4 class="header">Defining Controllers</h4>
    <p>
        A controller is just a regular PHP class that inherits the base
        controller from laravel. Usually an App base controller is also defined
        with additional functionality via traits. This base controller in the
        App namespace is also useful to define shared functionality available
        for all controllers.
    </p>
    <p>
        This is a valid controller class:
    </p>
    <pre><code class="php">// app/Http/Controllers/ExampleController.php
&lt;?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Base controller in the App namespace

class ExampleController extends Controller {

}</pre></code>

    <h4 class="header">Controller Namespacing</h4>
    <p>
        Controllers can be defined anywhere but you have to keep in mind that
        the <code>RouteServiceProvider</code> defines a <code>$namespace</code>
        property. This property is used in the route file as a prefix to every
        route that points to a controller.
    </p>
    <p>
        For example, if the <code>RouteServiceProvider</code> defines
        <code>$namespace</code> as <code>App\Http\Controllers</code> (the
        default), then the following route declaration.
    </p>
    <pre><code class="php">Route::get('/', 'HomeController@home');</code></pre>
    <p>
        Will try to find the controller as
        <code>App\Http\Controllers\HomeController</code>.
    </p>
    <p>
        This behavior can be used to further group controllers:
    </p>
    <pre><code class="php">Route::post('/access/qr', 'Access\QrController@access');</code></pre>
    <p>
        This will look for a controller named
        <code>App\Http\Controllers\Access\QrController</code>
    </p>

    <h4 class="header">Single Action Controllers</h4>
    <p>
        Controllers can be dedicated to a single action by making them
        invocable:
    </p>
    <pre><code class="php">class ProcessPaymentController extends Controller {
    public function __invoke() {
        // ...
    }
}</code></pre>
    <p>
        They can be specified in the routes with just the controller name.
    </p>
    <pre><code class="php">Route::post('/pay', ProcessPaymentController::class);</code></pre>

    <h4 class="header">Middleware</h4>
    <p>
        You can register middleware in the Controller's constructor (by default
        for all routes).
    </p>
    <pre><code class="php">class UserController extends Controller {
    public function __construct() {
        $this->middleware('can:read,user');
        $this->middleware('can:write,user')->only('store', 'update', 'delete');
    }

    // ...
}</code></pre>

</div>
@endsection
