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

    <p>
        They initialize stuff.<br />
        As far as I could found you are not supposed to touch them. You could,
        since they are a protected field in the Kernel. But probably shouldn't
        touch them anyway.
    </p>

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

    <h5 class="header">Experiment</h5>

    <p>
        As an experiment I have added a middleware that logs before and after
        the rest of the app handles the request.
    </p>

    <p>
        The middleware is at
        <code>app/Http/Middleware/LogRequests.php</code>.
    </p>

    <p>
        It is enabled in <code>app/Http/Kernel.php</code> in the
        <code>$middleware</code> array.
    </p>

    <p>
        Here is how a request looks in the logs:
    </p>

    <pre><code class="plaintext">[2020-11-13 22:18:14] local.DEBUG: LogRequests Before {"request":{"Illuminate\\Http\\Request":"GET / HTTP/1.1
Accept:                    text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Accept-Encoding:           gzip, deflate
Accept-Language:           en-US,en;q=0.9,es;q=0.8
Cache-Control:             max-age=0
Connection:                keep-alive
Content-Length:
Content-Type:
Cookie:                    XSRF-TOKEN=eyJpdiI6InN4RVRZb2Zic20yWlBQeWI0ZGtieFE9PSIsInZhbHVlIjoiRE5FSC9ibVAxOE1EMUNSTEF4SDhkZGRKTmFsYXhLZWRQLzRXN0pCUnVkY09OYW5MK0ZGOW1tTDlHd2wyNjlJZGlFVkkwS1JnekJuTzRHZHRhOXRlbjFpNDVCQ0NvRlE4MkhGZHA5SlNleUFxRzJLckpSUUVCN1F5QkFMNnZDYk0iLCJtYWMiOiIwMGMyMjMxMjE2ODI4ODFlNzc5Y2NhOTAxNTZlNzM1ZDQ4YmVmNGVkNTU3NTA5ZWE5MWJhOTllYzE1ZDZiMDllIn0%3D; laravel_certification_study_session=eyJpdiI6IlNVUUhvdjVESlM0NnIvdGxvcWVuRkE9PSIsInZhbHVlIjoiSURrODNNRHc0dzRTd2o5M0ZMVnhqT3Fqb1dvR3hEekNmQWRqaTFRWWRyUXkwQ0tlMGREaFVpVDdIRlJDRnBneFBIOEluOXBPVTZyMmJhVVdURng3ZS9RZEdvV2d6S0FHS05ucS9naFVHeVRONXRzQjZSUnFIbTk1djRTSUpuOVQiLCJtYWMiOiJiNThkZDFmM2M4ZTFhYWExYThhMDRiYzk0ZGE5YTk1NmZjMjc1MTNiMDUxYTE3Y2U0MmMwODZjMTMzMzdjZDdjIn0%3D
Host:                      lcs.local
Upgrade-Insecure-Requests: 1
User-Agent:                Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.193 Safari/537.36
Cookie: XSRF-TOKEN=eyJpdiI6InN4RVRZb2Zic20yWlBQeWI0ZGtieFE9PSIsInZhbHVlIjoiRE5FSC9ibVAxOE1EMUNSTEF4SDhkZGRKTmFsYXhLZWRQLzRXN0pCUnVkY09OYW5MK0ZGOW1tTDlHd2wyNjlJZGlFVkkwS1JnekJuTzRHZHRhOXRlbjFpNDVCQ0NvRlE4MkhGZHA5SlNleUFxRzJLckpSUUVCN1F5QkFMNnZDYk0iLCJtYWMiOiIwMGMyMjMxMjE2ODI4ODFlNzc5Y2NhOTAxNTZlNzM1ZDQ4YmVmNGVkNTU3NTA5ZWE5MWJhOTllYzE1ZDZiMDllIn0=; laravel_certification_study_session=eyJpdiI6IlNVUUhvdjVESlM0NnIvdGxvcWVuRkE9PSIsInZhbHVlIjoiSURrODNNRHc0dzRTd2o5M0ZMVnhqT3Fqb1dvR3hEekNmQWRqaTFRWWRyUXkwQ0tlMGREaFVpVDdIRlJDRnBneFBIOEluOXBPVTZyMmJhVVdURng3ZS9RZEdvV2d6S0FHS05ucS9naFVHeVRONXRzQjZSUnFIbTk1djRTSUpuOVQiLCJtYWMiOiJiNThkZDFmM2M4ZTFhYWExYThhMDRiYzk0ZGE5YTk1NmZjMjc1MTNiMDUxYTE3Y2U0MmMwODZjMTMzMzdjZDdjIn0=

"}}
[2020-11-13 22:18:14] local.DEBUG: LogRequests After {"response":{"Illuminate\\Http\\Response":"HTTP/1.1 200 OK
Cache-Control: no-cache, private
Content-Type:  text/html; charset=UTF-8
Date:          Fri, 13 Nov 2020 22:18:14 GMT
Set-Cookie:    XSRF-TOKEN=eyJpdiI6InJLb2RVcnF3UHgvK01rUjVGODl1c1E9PSIsInZhbHVlIjoiZTByZkdnU29PSlpXdm1pcWhsTXJNbW1ZanBsd3k4RkNuQXdMVEY5c3VzTmZLR0NZTzhuSnVlNnA5K2N5Ujl4U3JydUVjaTB4REV4V2FPd2ZsSnMzRnhXQmVhS0FIbW5IR09ybnNPZ2FzbmY3U3h0Y0huQ0hqTjFnRXQ4d0hEcmIiLCJtYWMiOiIxYTMwM2IzZjAwNjcxYWYwZjQ5ZDM4NjkxYmM0ZmFlNmExMjY3YTdmMDlhMjY0OGQ2ZjJhMGY0NTA5NDA1YjMyIn0%3D; expires=Sat, 14-Nov-2020 00:18:14 GMT; Max-Age=7200; path=/; samesite=lax
Set-Cookie:    laravel_certification_study_session=eyJpdiI6IlJPR0xESk0wakZHbTR3dHNTRVk2aVE9PSIsInZhbHVlIjoicjlKcFJLWXl2QkJzNndSQVhJcEZuWGErdEh3UUMyWXlTeW5ocjJhZHdHRUVOMTZjTkZlYTRCbUdtc2RDU21ncllaSk51OUxwdzFoZE5ZSTZSa1R1MWRPN0k1MC9qak91R1lldFUzZDE3ejcwT2lxQU1vTGVnNmxOVnZKYzI0Q2YiLCJtYWMiOiIzMmRmMmQzMzA5ZGI5Y2FmYTM4NWZhM2NlOTFkODM4MTkwZjQ1NDkyMmMzYmEzZWVjZjU0YzE2ODUzNWMzN2E0In0%3D; expires=Sat, 14-Nov-2020 00:18:14 GMT; Max-Age=7200; path=/; httponly; samesite=lax

&lt;!DOCTYPE html&gt;
&lt;html lang=\"en\"&gt;
&lt;head&gt;
    &lt;meta charset=\"UTF-8\"&gt;
    &lt;meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt;
    &lt;title&gt;Laravel Certification Study&lt;/title&gt;


    &lt;link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\"&gt;


    &lt;link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css\"&gt;

    &lt;style&gt;
        html {
            font-size: 16px;
        }
        .header {
            color: #ee6e73;
        }
        nav .brand-logo {
            margin-left: 1rem;
        }
    &lt;/style&gt;
    &lt;/head&gt;
&lt;body&gt;
    &lt;header&gt;
        &lt;nav&gt;
            &lt;div class=\"nav-wrapper\"&gt;
                &lt;a href=\"#\" class=\"brand-logo\"&gt;Laravel Certification Study&lt;/a&gt;
            &lt;/div&gt;
        &lt;/nav&gt;
    &lt;/header&gt;
    &lt;main&gt;

&lt;div class=\"container\"&gt;
    &lt;h3 class=\"header\"&gt;Topics&lt;/h3&gt;

    &lt;div class=\"collection\"&gt;
        &lt;a class=\"collection-item\" href=\"/topics/architecture\"&gt;Architecture&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;

    &lt;/main&gt;


    &lt;script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js\"&gt;&lt;/script&gt;

    &lt;/body&gt;
&lt;/html&gt;
"}}
    </code></pre>

    <h4 class="header">Service Container Binding and Resolution</h4>

    <p>
        The service container is a system that stores a map of class names to a
        closure that constructs an object of that type. It also stores instances
        which you can either directly bind or ask the service container to
        automatically keep a default instance (a singleton).
    </p>

    <p>
        For example, if I define a class like this:
    </p>

    <pre><code class="php">class Person {
    private $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function greet()
    {
        return "Hello! My name is $this->name.";
    }
}</code></pre>

    <p>
        I can add it to the service container in the following way:
    </p>

    <pre><code class="php">app()->bind(Person::class, function () {
    return new Person('Kevin');
});</code></pre>

    <p>
        And then, use it like this:
    </p>

    <pre><code class="php">$person = app()->make(Person::class);
$person->greet();</code></pre>

    <p>
        Actually, you can map any string to a closure or an instance. It doesn't
        have to be a class name. For example the framework stores some of it's
        classes with short names, like 'db'. Nevertheless you get some benefits
        for using a class name as a key, for example if your class constructor
        doesn't need any parameters you don't need to register it and the
        service container will be able to instantiate it.
    </p>

    <p>
        The main advantage of using the service container is decoupling of the
        class using a service and the service class. As well as being able to
        switch the class for a different one (dependecy injection). For example,
        you can change the class for a mock during testing.
    </p>

    <h5 class="header">Experiment</h4>

    <p>
        Here I do the same example as before but with actual code. If everything
        is working you should see <code>Hello! My name is Kevin.</code> below.
    </p>

    @php
        class Person {
            private $name;
            public function __construct(string $name)
            {
                $this->name = $name;
            }

            public function greet()
            {
                return "Hello! My name is $this->name.";
            }
        }

        app()->bind(Person::class, function () {
            return new Person('Kevin');
        });

        $person = app()->make(Person::class);
    @endphp

    <pre><code class="php">{{ $person->greet() }}</code></pre>

    <p>
        The class was registered in the service container with the name
        <code>{{ Person::class }}</code>.
    </p>

    <h4 class="header">Service Providers</h4>

    <p>
        Bootstrappers initialize core functionality of the framework in order
        for the rest to work well. But we, the users of the framework also need
        sometimes ways to initialize some <em>service</em> and <em>provide</em>
        it to the rest of the application.
    </p>

    <p>
        A service provider is a class that you create to get the framework to
        initialize stuff for us. It has a couple of methods:
        <code>register</code> and <code>boot</code>. <code>register</code> is
        used to bind things in the service container, <code>boot</code> is used
        to initiallize anything else. Here is an example:
    </p>

    <pre><code class="php">class DateServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(DateHelper::class, function () {
            return new DateHelper();
        });
    }

    public function boot()
    {
        date_default_timezone_set('America/Bogota');
    }
}</code></pre>

    <p>
        Where <code>DateHelper</code> is a class defined like this.
    </p>

    <pre><code class="php">class DateHelper {
    public function formatLocal(Carbon $date)
    {
        return $date->format('d/m/Y h:i a');
    }
}</code></pre>

    <h5 class="header">Experiment</h5>

    <p>
        Add the previous 2 classes to the project, add the provider to
        <code>app.php</code>.
        Then use the following code.
    </p>

    <pre><code class="php">app()->make(DateHelper::class)->formatLocal(now())</code></pre>

    <p>Result:</p>

    <pre><code class="plaintext">{{ app()->make(\App\Contracts\DateHelper::class)->formatLocal(now()) }}</code></pre>

    <h4 class="header">Facades</h4>

    <p>
        A common case when using the service container is geting an instance and
        then calling some method within it. For example:
    </p>

    <pre><code class="php">app()->make(DateHelper::class)->formatLocal(now())
app()->make('db')->getDatabaseName()</code></pre>

    <p>
        This gets kind of annoying really fast. It would be easier if we could
        call these methods like this.
    </p>

    <pre><code class="php">Date::formatLocal(now())
DB::getDatabaseName()</code></pre>

    <p>
        This kind of syntax can be enabled by using the
        <code>__callStatic()</code> magic method. Laravel used this to expose
        a more ergonomic interface to multiple of the built-in services.
    </p>

    <p>
        If we want to create a facade for our own service, it's quite simple
        since the <code>Facade</code> class was designed to be inherited from
        to create other facades.
    </p>

    <pre><code class="php">class Date extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return DateHelper::class;
    }
}</code></pre>

    <p>
        You only need to override a single method returning the name of the
        entry in the Service Container. In fact, here is how the built in facade
        for DB looks.
    </p>

    <pre><code class="php">class DB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'db';
    }
}</code></pre>

    <h5 class="header">Experiment</h5>

    <p>
        Given the previous <code>Date</code> class
        (<code>app/Facades/Date.php</code>). This code:
    </p>

    <pre><code class="php">Date::formatLocal(now())</code></pre>

    <p>Produces this:</p>

    <pre><code class="plaintext">{{\App\Facades\Date::formatLocal(now())}}</code></pre>


    <h4 class="header">HTTP Verbs</h4>

    <p>
        The HTTP verbs are a part of an HTTP Request, that indicates the desired
        action to be performed for a resource.
    </p>

    <p>
        Although any verb can be used for any action, each one of the commonly
        used verbs has defined semantics: The most commonly used verbs are:
        GET, POST, PUT, DELETE, PATCH, HEAD and OPTIONS.
    </p>

    <p>
        In laravel you can manually get the verb of the request using the
        <code>method</code> function in the Request Facade.
    </p>

    <pre><code class="php">Request::method()</code></pre>
    <pre><code class="plaintext">{{Request::method()}}</code></pre>
</div>

@endsection

@push('styles')
<style>
    pre {
        overflow-x: auto;
        border-radius: 5px;
        max-height: 40vh;
    }

    code {
        background-color: rgba(0,0,0,0.1);
        border-radius: 2px;
        padding-left: 4px;
        padding-right: 4px;
    }
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/atom-one-dark.min.css">
@endpush

@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@endpush
