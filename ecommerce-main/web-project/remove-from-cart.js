document.addEventListener("DOMContentLoaded",()=>{

const deleteBtns=document.querySelectorAll("button.delete-btn")
const cart=document.querySelector("div.cart")
deleteBtns.forEach(btn=>{
    btn.addEventListener("click",(e)=>{
   
    productId=btn.dataset.id;
    const formData = new FormData();
    formData.append('product_id', productId);
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
        alert("Item deleted to cart successfully!");
        deleteItem(productId)
       

    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        alert("Failed to add item to cart.");
    })
})
function deleteItem(id){
    console.log(id)
    const product = document.querySelector(`div[id='${id}']`);
    console.log(product,typeof product)
    cart.removeChild(product)
}
})

})