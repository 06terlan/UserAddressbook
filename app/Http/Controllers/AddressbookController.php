<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressbookRequest;
use App\Model\Addressbook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Class AddressbookController.
 *
 * @author Tarlan Abdullayev
 */
class AddressbookController extends Controller
{

	/**
     * Display a listing of the addresses.
     *
     * @param App\Http\Requests\AddressbookRequest $request
     *
     * @return \Illuminate\Http\Response
    */
    public function index(AddressbookRequest $request)
    {
    	$addresses = Addressbook::with('owner')->orderByDesc('created_at');
    	$this->addressbookFilter($addresses, $request);

    	$data = [
    		'request'=> $request, 
    		'addresses'=> $addresses->paginate(15)
    	];

    	return view('page.addressbook', $data);
    }

    /**
     * Filter the date for request.
     *
     * @param Illuminate\Database\Eloquent\Builder $addresses
     * @param App\Http\Requests\AddressbookRequest $request
     *
    */
    public static function addressbookFilter(Builder $addresses, AddressbookRequest $request)
    {
        if($request->get('name')) 
            $addresses->where('name', 'like', '%'.$request->get('name').'%');
        if($request->get('LastName')) 
            $addresses->where('LastName', 'like', '%'.$request->get('LastName').'%');
        if($request->get('mail')) 
            $addresses->where('mail', 'like', '%'.$request->get('mail').'%');
        if($request->get('phone')) 
            $addresses->where('phone', 'like', '%'.$request->get('phone').'%');
        if($request->get('Department')) 
            $addresses->where('Department', 'like', '%'.$request->get('Department').'%');
        //duplicate check
        if($request->get('duplicate'))
        	$addresses->whereIn('phone', function($query){ 
        		$query->select('phone')->from('addressbook')->groupBy('phone')->havingRaw('count(*) > 1');
        	})->orderBy('phone');
    }
}
