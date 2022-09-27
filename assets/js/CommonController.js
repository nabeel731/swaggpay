const shareURL = (sharingID,type='post') => {
	let url="invite?id="+sharingID;
  if (navigator.share) {
    navigator.share({
      title: 'Share Post',
      url: url
    }).then(() => {
      console.log('Thanks for sharing!');
    })
    .catch(console.error);
  } else {
	   console.log('Web share api is not supported on this browser!');
	   $("#shareModal").modal('show');
	   $("#shareURLInut").val(url);
	   $("#whatsapp-share").attr('href','https://wa.me/?text='+url);
	   $("#facebook-share").attr('href','https://www.facebook.com/sharer/sharer.php?u='+url);
	   $("#twitter-share").attr('href','https://twitter.com/share?text='+url);
	   $("#reddit-share").attr('href','https://www.reddit.com/submit?url='+url);
	   $("#telegram-share").attr('href','tg://msg_url?url='+url);
	   $("#vk-share").attr('href','https://vk.com/share.php?url='+url);
	   $("#messenger-share").attr('href','https://www.messenger.com/t/sharer.php?link='+url);
	  
    //shareDialog.classList.add('is-open');
  }
}



function copyLink() {
 
  var copyText = document.getElementById("shareURLInut");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");
$("#copy-message").text("link copied");
}
