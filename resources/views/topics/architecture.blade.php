@extends('layouts.master')

@section('content')

<div class="container">
    <h3 class="header">Architecture</h3>

    <h4 class="header">Request Lifecycle</h4>

    <p>
        For starters an http request arrives from a client to the server.
    </p>

    <p>
        Nginx/Apache directs the request towards public/index.php which does the
        autoloading and passes it along to the next step.<br />

        At this point the service container is initialized.
    </p>

    <p>
        Then the kernel defines and runs the bootstrappers. It also defines and
        runs the middlewares. <br />

        The kernel has a method called <code>handle()</code> which is THE
        application, it receives a <code>Request</code> object and returns a
        <code>Response</code> object.
    </p>

    <h5 class="header">Bootstrapper</h5>

    <p>They initialize stuff</p>

    <h5 class="header">Middleware</h5>

    <p>
        A middleware receives a request and either detects or modifies something
        in the request. Or they can decide to terminate the cycle without
        letting the rest of the application handle the request.
    </p>

    <p>
        The middleware itself defines whether it runs before or after the rest
        of the application.
    </p>
</div>

@endsection
