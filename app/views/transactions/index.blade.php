@extends('layouts.master')

@section('content')
	

<!--this table??-->
                      <div style="padding:35px" class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-exchange"></i> Transactions</h4>
    
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Category Name</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Type</th>
                                  <th><i class="fa fa-calendar"></i> Frequency</th>
                                  <th><i class=" fa fa-money"></i> Amount</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 @foreach ($transactions as $transaction)
                                  <td style="padding:15px">{{ $transaction->title }}</td>
                                  <td style="padding:15px">{{ $transaction->type}}</td>
                                  <td style="padding:15px">{{$transaction->frequency}}</td>
                                  <td style="padding:15px" class="numeric">{{ $transaction->amount }}</td>
                                  <td style="padding:15px">
                                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      {{ Form::open(array('action' => array('TransactionsController@destroy', $transaction->id), 'method' => 'DELETE', 'id' =>'delete-form', 'style' => 'display:inline')) }}
                                      <button class="btn btn-danger btn-xs" type="submit" action="TransactionsController@index"><i class="fa fa-trash-o "></i></button>
                                      {{ Form::close() }}
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
        

@stop