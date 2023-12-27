<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/4.0.1/js/jquery.orgchart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/4.0.1/css/jquery.orgchart.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

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
    /* height: 420px; */
    border: 1px solid #aaa;
    overflow: auto;
    text-align: center;
    }

    /* //org chart style */
    .orgchart .top-level .title {
  background-color: #006699;
}
.orgchart .top-level .content {
  border-color: #006699;
}
.orgchart .middle-level .title {
  background-color: #009933;
}
.orgchart .middle-level .content {
  border-color: #009933;
}
.orgchart .bottom-level .title {
  background-color: #993366;
}
.orgchart .bottom-level .content {
  border-color: #993366;
}

.orgchart .node .content{
    height: 194px!important;
}
    </style>
</head>
<body>
<h1>User Tree</h1>


<div id="chart-container"></div>

</body>
<script>
//       $(function() {

// $('#chart-container').orgchart({
//   'data' : $('#ul-data'),
//   'nodeContent': 'name'
// });

// });
(function($) {
    $(function() {
        var ds = {!! json_encode($usersTree) !!};
        console.log(ds);

        var oc = $('#chart-container').orgchart({
            'data': ds,
            'nodeContent': 'total_childs',
            'createNode': function($node, data) {
                // Add profile photo to the node
                var photoUrl = data.photo || 'default_photo_url.jpg'; // Provide a default photo URL if 'photo' is not available
                $($node).find('.content').append(`<p><span class="user-plan">Bronze</span></p><div class="profile-photo"><img src="${photoUrl}" alt="Profile Photo" width="100"></div><a href="/userTree/${data.id}">View Details</a>`);
                // $node.append(`<span class="user-plan">Bronze</span><div class="profile-photo" style="display:none"><img src="${photoUrl}" alt="Profile Photo" width="100"></div>`);
            }
        });
        console.log('oc', oc);
        // $('.node').click(function (e) {
        //     e.preventDefault();
        //     console.log("click");
        //     $(this).find('.profile-photo').show();
        // });
    });
})(jQuery);

</script>

</html>
