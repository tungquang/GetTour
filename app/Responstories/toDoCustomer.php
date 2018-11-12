<?
  namespace App\Responstories;

  use App\Interfaces\CustomerInterface;

  /**
   *
   */
  class toDoCustomer implements CustomerInterface
  {

    public function index()
    {
      return view('admin.customer.customer-list');
    }
  }
