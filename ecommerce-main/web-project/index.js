
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".product button");

    let verify;
    buttons.forEach(button => {
        button.addEventListener("click", function() {
              verify=confirm("do you really want to add")
            if(confirm){
            const productId = this.getAttribute("data-id");
            const quantity = this.previousElementSibling.value;
            const image_url=this.parentNode.querySelector("img").getAttribute("src")
           const price=this.parentNode.querySelector("p.price").innerHTML.split("$")[1];
          
         

           // Assuming you have productId and quantity defined earlier in your code

// Construct the data to send in the body of the request
const formData = new FormData();
formData.append('product_id', productId);
formData.append('quantity', quantity);
formData.append('image_url', image_url);
formData.append('price', price);
fetch('add_to_cart.php', {
    method: 'POST',
    body: formData
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.text();
})
.then(data => {
    alert("Item added to cart successfully!");
})
.catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
    alert("Failed to add item to cart.");
})
}


    })
})

})
