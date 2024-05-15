
//bdy = document.getElementById('mybdy');

function load_count_cart(){
    let nxobj = new XMLHttpRequest();
    nxobj.onload = function(data){
            //alert(nxobj.responseText)
            document.getElementById("count_cart").innerHTML = nxobj.responseText
        }
        nxobj.open("GET","countcart.php", true);
        nxobj.send();
}
function insert(id){
    let xobj = new XMLHttpRequest();

    xobj.onload = function(data){
        load_count_cart();
    }

    xobj.open("GET","cart_insert.php?id="+id, true);
    xobj.send();

    
}

function search(){
    let item = document.getElementById("search").value;
    // alert(item)
    let xobj = new XMLHttpRequest();

    xobj.onload = function(data){
        var data = JSON.parse(xobj.responseText)
        var str = '';
        var len= data.length;
        str = str + '<div class="shop-section">';
        for(i=0; i<len;i++){

            
                str = str + '<div class="box1 box">';
                    str = str + '<div class="box-content">';
                        str = str + '<h2>' + data[i]['product_name'] + '</h2>';
                        str = str + '<div class="bg-image" > <img src="../images/prd_categ/'+data[i]['product_image']+'" alt=""></div>';
                        str = str + '<div class="button_sec">';
                        str = str + '<button type="button" onclick="insert('+data[i]['product_id']+')">add to cart</a></button>';
                        str = str + '<a href="quick_look.php?id='+data[i]['product_id']+'"><button type="button"> quick look</button></a>';

                        str = str + '</div>';  
                        str = str + '</div>';
                        str = str + '</div>';
                
                        
        }
        str = str + '</div>';
        document.getElementById('searchhere1').innerHTML = str;
        // alert(xobj.responseText);
    }
    xobj.open("GET", "search.php?item="+item, true);
    xobj.send();
}

// cart.php
function dicriment(obj){
    let val=document.getElementById(obj).value;
    if(val>1){
        let val=document.getElementById(obj).value-=1;
    }
}

function incriment(obj){
    let val=document.getElementById(obj).value;
    let val3=parseInt(val);
    let val2=document.getElementById(obj).value=val3+1;

}

function updateQty(id, qty, msg, price){
    let xobj = new XMLHttpRequest();

    xobj.onload = function(data){
        //document.getElementById("'"+msg+"'").innerHTML = xobj.responseText;
        // alert(xobj.responseText);
    }
    xobj.open("GET", "check_cart.php?id="+id+"&qty="+qty+"&price="+price, true);
    xobj.send();
    //  window.location.href = 'cart.php';
}