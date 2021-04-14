

@include('layouts.navbar')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>P(l)ain</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
        }   
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <div class="title">
            <h3>Plain.com</h3>
        </div>
       @if (\Auth::user()->admin ==  true)
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Użytkownik</th>
                    <th>Data dodania</th>
                    <th>Komentarz</th>
                </tr>
            
            </thead>
            <tbody>
                @foreach($comments as $comment)
                @if($comment->reports >0)
                <tr>
                    
            <td> <?php
                        
                         echo '<img src="/tai/public/images/'.$comment->user_id.'.jpg"  alt="sratatata" width="100"  height="100">';
                 ?>
            </td>
             <td>{{$comment->user->nick}}</td>  
              <td>{{$comment->created_at}}</td>   
               <td>{{$comment->message}} 
                   <br /> @if($comment->user_id == \Auth::user()->id)
 
 @endif</td>
               </tr>
   
               <tr>
                    <td>   <a href="{{ route('delete_user', $comment->user_id) }}"
 class="btn btn-danger btn-xs"
 onclick="return confirm('Jesteś pewien?')"
title="Skasuj"> Usuń użytkownika
 </a></td>
                    <td></td>
                   <td></td>
                   <td>
                   
                     <a href="{{ route('delete', $comment->id) }}"
 class="btn btn-danger btn-xs"
 onclick="return confirm('Jesteś pewien?')"
title="Skasuj"> Usuń komentarz
 </a>
                   </td>          
            </tr>
            @endif
               @endforeach
             </tbody>
             
        </table>
         @endif
        <br>       
       
    </div>     
  
    @guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć komentarze.</b>
    </div>    
    @endguest
    <div class="footer-button">
<a href="{{ route('create') }}" class="btn btn-secondary">Dodaj</a>
</div>

</body>
</html>


