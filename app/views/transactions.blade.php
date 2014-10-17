@extends('layouts.master')

<style type="text/css"> 

          .jumbotron {
              padding: 30px;
              margin-bottom: 30px;
              color: white;
              background-color: black;

              /*background-image: url(img/bitcoin_conversion.jpeg);*/
              }

          .container .jumbotron {
              border-radius: 100px;
              }

            .button .jumbotron{
                  margin: 0;
                  font: inherit;
                  color: black;
                  }
        </style>

                <!-- Post Content -->
                @section('content')
                    <h1>Transactions Page</h1>
                    <!-- <img class="gekko" src="300px-Walter_White2.jpg" alt="wall street"> -->
                <!-- Author -->
                    <p class="lead">
                        <!-- by <a href="http://www.savewalterwhite.com/"> -->Yo! its your transactions page!
                    </p>

                    <img class="gekko" src="Bonus_Money.jpg" alt="wall street">
                    


                    @foreach ($transactions as $transaction)
                        

                        <h3>Entry: {{ $transaction->id }} <span class="glyphicon glyphicon-time"></span> {{ $transaction->created_at->format(Post::DATE_FORMAT) }} </h3>
                         

                <div class="container">
                    <div class="row">
                      <div class="col-md-8 col-md-8">

                        <div class="jumbotron">
                        <h2> {{ $transaction->name }} </h2>

                        <h4>enter transaction --  {{ $transaction->debit }}</h4>
                        <!-- <h4><img src="{{{ $post->image }}}" alt="wall street">
                         </h4> --></jumbotron>
                        {{ Form::open(array('action' => 'TransactionsController@store', 'class' => 'form-horizontal')) }}

                            
                            <!-- <textarea class="form-control" input type="textarea" name="comment" id="comment" placeholder="comment" value="{{{ Input::old('comment') }}}"></textarea> -->

                            <!-- {{$errors->first('comment', '<span class="help-block">:message</span>')}} -->

                        <p>{{{""}}}</p>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ Form::close() }} 

                        </div>
                     </div>
                  </div>
                </div>
                        
                        <!-- <p><span class="glyphicon glyphicon-time"></span>-- last updated {{ $transaction->updated_at->format(Post::DATE_FORMAT)}}-- <button><a href="{{{action('TransactionsController@edit', $post->id)}}}">Edit/Delete</a></button></p>
 -->
                        

                    @endforeach
                    <!-- {{ $transactions->links() }} -->

                    @stop

@section('bottom-script')
    // <script type="text/javascript">
    
    // </script>

@stop



