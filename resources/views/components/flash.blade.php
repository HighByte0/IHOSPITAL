@if(session()->has('message'))
    <div x-data="{show:true}" x-init="console.log('Setting flash message'); setTimeout(()=>show=false,3000)" x-show="show" class="alert alert-success fixed top-0 left-1/2 transform -translate-x-1/2" style="border-radius: 0 0 50px;">
        
    </div>
@endif
