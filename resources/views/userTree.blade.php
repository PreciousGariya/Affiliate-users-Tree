<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/4.0.1/js/jquery.orgchart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/4.0.1/css/jquery.orgchart.css" integrity="sha512-Tnxj/C1VZKWks1kmK3dcJUFF5BxbhZsQgTR0MAKo9+a2Gz4mP+QbqC4hnJaf15UlLXlYzhqrerlK5/4e0aphPA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
body {
  font-family: Calibri, Segoe, "Segoe UI", "Gill Sans", "Gill Sans MT", sans-serif;
}

/* It's supposed to look like a tree diagram */
.tree, .tree ul, .tree li {
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;
}

.tree {
    margin: 0 0 1em;
    text-align: center;
}
.tree, .tree ul {
    display: table;
}
.tree ul {
  width: 100%;
}
    .tree li {
        display: table-cell;
        padding: .5em 0;
        vertical-align: top;
    }
        /* _________ */
        .tree li:before {
            outline: solid 1px #666;
            content: "";
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }
        .tree li:first-child:before {left: 50%;}
        .tree li:last-child:before {right: 50%;}

        .tree code, .tree span {
            border: solid .1em #666;
            border-radius: .2em;
            display: inline-block;
            margin: 0 .2em .5em;
            padding: .2em .5em;
            position: relative;
        }
        /* If the tree represents DOM structure */
        .tree code {
            font-family: monaco, Consolas, 'Lucida Console', monospace;
        }

            /* | */
            .tree ul:before,
            .tree code:before,
            .tree span:before {
                outline: solid 1px #666;
                content: "";
                height: .5em;
                left: 50%;
                position: absolute;
            }
            .tree ul:before {
                top: -.5em;
            }
            .tree code:before,
            .tree span:before {
                top: -.55em;
            }

/* The root node doesn't connect upwards */
.tree > li {margin-top: 0;}
    .tree > li:before,
    .tree > li:after,
    .tree > li > code:before,
    .tree > li > span:before {
      outline: none;
    }
        #chart-container {
    font-family: Arial;
    height: 420px;
    border: 1px solid #aaa;
    overflow: auto;
    text-align: center;
    }
    </style>
</head>
<body>
<h1>User Tree</h1>
<ul class="tree" id="ul-data">
    <li>
            <span><a href="{{route('userTree',$usersTree->id) }}"> {{ $usersTree->name   }}</a></span>
            <ul>
                @include('partials.user_tree', ['usersTree' => $usersTree->referred_users])
            </ul>
        </li>

</ul>

<!-- <div id="chart-container"></div> -->

</body>
<script>
//       $(function() {

// $('#chart-container').orgchart({
//   'data' : $('#ul-data'),
//   'nodeContent': 'name'
// });

// });
    // (function($) {
    //     $(function() {
    //         var ds = {!! json_encode($usersTree) !!};

    //         var oc = $('#chart-container').orgchart({
    //             'data': ds,
    //             'nodeContent': 'title'
    //         });
    //     });
    // })(jQuery);
</script>

</html>
