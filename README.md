Tech shop with shopping cart and admin page.

<h1>Install steps</h1>

<ol>
  <li>
    Clone repository to your progect folder
    <br>
    <code>git clone https://github.com/VladPavliuk/Sales-Points &lt;your_project_folder&gt; </code>
  </li>
  <li>
    Install composer dependencies:
    <br>
    <code>composer install</code>
  </li>
  <li>
    Open PhpMyAdmin
  </li>
      <li>
        Create new data base (online-shop e.g.)
      </li>
      <li>
        Go to SQL menu of created data base
      </li>
      <li>
        Paste sql code from <code>data_base_seeds.sql</code> and complete it.
      </li>
   <li>
    Open configs/dbconfig.php
   </li>
   <li>
    Set your data base configuration. (dbName the same as you created in PhpMyAdmin)
   </li>
   <li>
    Start project:
    <br>
    in public folder: <code>php -S localhost:8000</code>
   </li>
</ol>
