@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white" style="font-weight: bold; font-size: 18px"><span class="text-primary">Abdel.</span> ChatX</div>

                    <div class="card-body" id="app">
                         <chat-app :user="{{ auth()->user() }}"></chat-app>
                        <!-- <div style="display:inline-flex;" class="mt-5">
                        container element in which TalkJS will display a chat UI  
                        <div id="contacts-list">
                            <h2>Contacts  <i class="fa fa-map-marker" id="user-location"></i> </h2>
                        
                        </div>
                        <div id="talkjs-container">
                        <i>Loading chat...</i>
                        </div>     
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
   const contactsList = <?php echo json_encode($users[0]);?>;
    const currentUser=<?php echo json_encode($current_user); ?>;
</script>
 <script src="{{ asset('js/chatapp.js') }}" type="text/javascript"></script>
@endsection
