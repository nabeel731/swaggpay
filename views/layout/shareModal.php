<style>

.modal-title {
    font-weight: 900
}

#share-modal-content {
    border-radius: 13px
}

#share-modal-body {
    color: #3b3b3b
}

.img-thumbnail {
    border-radius: 33px;
    width: 61px;
    height: 61px
}

.fab:before {
    position: relative;
    top: 13px
}

.smd {
    width: 200px;
    font-size: small;
    text-align: center
}

#share-modal-footer {
    display: block
}

.ur {
    border: none;
    background-color: #e6e2e2;
    border-bottom-left-radius: 4px;
    border-top-left-radius: 4px
}

.cpy {
    border: none;
    background-color: #e6e2e2;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    cursor: pointer
}

button.focus,
button:focus {
    outline: 0;
    box-shadow: none !important
}

.ur.focus,
.ur:focus {
    outline: 0;
    box-shadow: none !important
}

#copy-message {
    font-size: 11px;
    color: #ee5535
}

</style>


<!--<div class='container d-flex justify-content-center mt-100'> <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#exampleModal"> Share on social media </button> </div>-->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="share-modal-content" class="modal-content col-12">
            <div class="modal-header">
                <h5 class="modal-title">Share</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body" id="share-modal-body">
                <div class="icon-container1 d-flex">
                    <div class="smd"> 
						<a id="twitter-share" target="_blank"><i class=" img-thumbnail fab fa-twitter fa-2x" style="color:#4c6ef5;background-color: aliceblue"></i></a>
                        <p>Twitter</p>
                    </div>
                    <div class="smd"> 
						<a id="facebook-share" target="_blank"><i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i></a>
                        <p>Facebook</p>
                    </div>
                    <div class="smd"> 
						<a id="reddit-share" target="_blank"><i class="img-thumbnail fab fa-reddit-alien fa-2x" style="color: #FF5700;background-color: #fdd9ce;"></i></a>
                        <p>Reddit</p>
                    </div>
                    <div class="smd"> <i class="img-thumbnail fab fa-discord fa-2x " style="color: #738ADB;background-color: #d8d8d8;"></i>
                        <p>Discord</p>
                    </div>
                </div>
                <div class="icon-container2 d-flex" style="margin-top:15px;">
                    <div class="smd"> 
						<a id="whatsapp-share" target="_blank"><i class="img-thumbnail fab fa-whatsapp fa-2x" style="color: #25D366;background-color: #cef5dc;"></i></a>
                        <p>Whatsapp</p>
                    </div>
                    <div class="smd"> 
					<a  id="messenger-share" target="_blank"><i class="img-thumbnail fab fa-facebook-messenger fa-2x" style="color: #3b5998;background-color: #eceff5;"></i></a>
                        <p>Messenger</p>
                    </div>
                    <div class="smd"> 
						<a id="telegram-share" target="_blank"><i class="img-thumbnail fab fa-telegram fa-2x" style="color: #4c6ef5;background-color: aliceblue"></i></a>
                        <p>Telegram</p>
                    </div>
                    <div class="smd"> 
						<a id="vk-share" target="_blank"><i class="img-thumbnail fab fa-vk fa-2x" style="color: #7bb32e;background-color: #daf1bc;"></i></a>
                        <p>VK</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="share-modal-footer"> <label style="font-weight: 600">Copy URL <span  id="copy-message"></span></label><br />
                <div class="row"> 
					<input class="col-10 ur" type="url" placeholder="https://www.livewaves.app" id="shareURLInut" aria-describedby="inputGroup-sizing-default" style="height: 40px;"> 
					<button class="cpy" onclick="copyLink()"><i style="margin-right:10px" class="far fa-clone"></i></button> 
				</div>
            </div>
        </div>
    </div>
</div>