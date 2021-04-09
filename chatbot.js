const popup = document.querySelector('.chat-popup');
const chatBtn = document.querySelector('.chat-btn');
const submitBtn = document.querySelector('.submit');
const chatArea = document.querySelector('.chat-area');
const inputElm = document.querySelector('input');
const emojiBtn = document.querySelector('#emoji-btn');
const picker = new EmojiButton();


// Emoji selection  
window.addEventListener('DOMContentLoaded', () => {

    picker.on('emoji', emoji => {
      document.querySelector('input').value += emoji;
    });
  
    emojiBtn.addEventListener('click', () => {
      picker.togglePicker(emojiBtn);
    });
  });        


chatBtn.addEventListener('click', ()=>{
    popup.classList.toggle('show');
})

submitBtn.addEventListener('click', ()=>{
    let userInput = inputElm.value;

    let text = `<div class="firstmessage">
    <span class="secondmessage">${userInput}</span>
    <div class="firstmessage">
    </div>`;

    chatArea.insertAdjacentHTML("beforeend", text);
    inputElm.value = '';

})


// var text = {

// };
// function talk() {
//    var user =document.value;
//    document.innerHTML +=user+"<br>";
//   if(user in text){
//       document.innerHTML += text[user]+"<br>";
//   } else{
//       document.innerHTML+="Thank you for providing this valuable information. We will respond shortly";}}
