<?php
 
 
 
namespace App\Http\Controllers;
 
 
 
use Illuminate\Http\Request;
 
use DB;
 
 
 
 
class SearchController extends Controller
{
 
   function __construct()
   {

       $this->middleware('auth'); 

   } 

   public function index()
 
{
 
return view('search.search');
 
}
 
 
 
public function search(Request $request)
 
{
 
if($request->ajax())
 
{
 
$output="";
 
$users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
 
if($users)
 
{
 
foreach ($users as $key => $user) {
 
$output.='<tr>'.
 
'<td><a href="/users/' . $user->id . '">'.$user->name .'</a></td>'.
 
'</tr>';
 
}
 
 
 
return Response($output);
 
 
 
   }
 
 
 
   }
 
 
 
}
 
}