# Odious
Simple PHP Framework

<h2>Install steps</h2>
<ol>
    <li> 
        Clone GitHub repositorie from: <br>
        https://github.com/VladPavliuk/Odious
    </li>
    <li>
        By terminal or cmd install dependencies <br>
        <code>composer install</code>
    </li>
    <li>
        Start using!
    </li>
</ol>

<h2>Default dependencies</h2>
By default Odious framework using Smarty 3 template engine

<h2>Brief Manual</h2>
<h3>Creating page</h3>
<ol>
    <li>
        <b>Create route in file:</b><br>
        <code>app/routes/main_routes.php</code><br>
        <i>file main_routes.php is just array of routes</i>
		<p>
		<b>Example of route:</b><br>
		<code>'GET:news/sport' => 'news/category/sport:news,category'</code><br>
		<br>
		<code>GET:</code> is HTTP request method<br>
		<code>news/sport</code> is URI request<br>
		<code>news/category/sport</code> is inner Path, where:
		<ul>
			<li><code>news</code> is NewsController class</li>
			<li><code>category</code> is categoryAction in NewsController class</li>
			<li><code>sport</code> is parameter for categoryAction method</li>
		</ul>
		<br>
		<code>:news,category</code> is list of including modules
		<br>
		<br>
    </li>
    <li>
		<b>Create controller class</b><br>
		All controllers class stored in <code>app/controllers/</code> folder
		<p>
			<b>Example of Controller class:</b><br>
			<pre><code>
// Create file NewsController.php in app/controllers folder
			
class NewsController 
{
	// Here stored all methods for control application			
}
			</pre></code>
		</p>
    </li>
    <li>
		<b>Create action method in Controller class</b><br>
		<b>Notice:</b> all controllers methods which must be enable for using by client<br>
		Should has ending <code>Action</code><br>
		And be <code>public</code> method
		<p>
			<b>Example of action method:</b><br>
			<pre><code>		
class NewsController 
{

	// Create public method indexAction() in NewsController class
	
	public function indexAction()
    {
        // Here stored all code for controlling application by client
    }			
}
			</pre></code>
		</p>
    </li>
    <li>
		<b>Set your code in method action!</b>
		<p>
			<b>Example of rendering welcome page:</b><br>
			<pre><code>
class NewsController 
{
	public function indexAction()
    {
        // Smarty initialization
        $smarty = SmartyRun::connect();

        $smarty->display("contents/welcome.tpl");
    }			
}
			</pre></code>
		</p>
    </li>
</ol>
<h3>Framework folders structure</h3>
<pre><code>		
<b>/root</b>
....<b>/app</b>              <i>all your code (controllers, models, views) stored here</i>
.........<b>/Router</b>	     <i>store Router (analize client request and)</i>
.........<b>/Template</b>    <i>store Template information</i>
.........<b>/controllers</b> <i>stored all controllers</i>
.........<b>/models</b>	     <i>stored all models</i>
.........<b>/view</b> 	     <i>stored all views</i>
....<b>/config</b>           <i>store all configurations</i>
......../config.php              <i>store all main configuration</i>
......../dbconfig.php            <i>store all connection to data base configuration</i>
......../smarty_config.php       <i>store template configurations</i>
....<b>/public</b>                   <i>web space folder, here stored index.php and images, scripts, styles</i>
....<b>/vendor</b>                   <i>composer folder</i>
..../composer.json               <i>store all composer dependencies</i>
</pre></code>
