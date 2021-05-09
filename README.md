1. Cek Resi

change API Key:
1. open file app/Models/CekResiModels.php
2. modify variable name = api_key

TODO :
1. Launch php artisan serve
2. go to localhost:8000/index
3. check Nomer Resi and courier in BinderByte
(https://documenter.getpostman.com/view/12963788/TVRg69g4#3c9167a4-2fe2-4702-a7dd-79fdc4037c87)
4. voala cek resi done with extra response

==================================================

2. API Corona Indonesia

TODO :
1. Launch php artisan serve
2. go to localhost:8000/api/corona
3. voala data from corona indonesia

Sort Column :
1. open file app/Http/Controllers/apiCoronaController
2. change value from variabel namaColumn

change url or get api json from url
1. just use function from ApiConnect class from models
(ps : since view made for data corona so you must change or add your view)

Corona Chart :
1. open link http://localhost:8000/api/corona/chart
2. and voala chart

---------------------------------------------------------
making chart step by step section
1. install in terminal = composer require consoletvs/charts "7.*"
2. publish configure file = php artisan vendor:publish --tag=charts
3. making chart folder and file = php artisan make:chart {{name chart}}
4. go to App\Chart and open file you create in step 3.
5. register chart in App\Providers\AppServiceProvider and go to boot() function
use this code
$charts->register([
        \App\Charts\SampleChart::class //change SampleChart to class chart you make in //step 3.
]);
6. you can run chart data in route that laravel provide, you can check using command php artisan route:list -c
7. and if you done with all config chart making route in routes/web
8. making controller for controll route chart
9. return view chart
10. making view blade (https://charts.erik.cat/guide/render_charts.html) source code
11. you can costumize front end with chartisan (https://chartisan.dev/documentation/installing#Installing-the-front-end-adapter)
12. and change or delete script from step number 10. with script from number 11.
13. and voala chart is done is you visit link in route you just make in web.

