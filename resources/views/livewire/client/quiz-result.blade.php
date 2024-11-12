<div class="bg-gradient-to-b from-[rgba(171,229,65,1)] via-35% via-[rgba(64,196,168,1) ] to-[rgba(2,100,166,1)] w-full grid justify-items-center">
    @push('meta')
        <meta property="og:image" content="{{asset('results/'.$client->id.'.jpg')}}" />
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:image" content="{{asset('results/'.$client->id.'.jpg')}}" />
        <meta property="og:title" content="{{$client->name}}" />
        <meta name="twitter:title" content="{{$client->name}}">

        <meta property="og:description" content="{{$client->name}}" />
        <meta property="twitter:description" content="{{$client->name}}" />

        <meta property="og:url" content="{{URL::current()}}" />
        
        <meta property="og:site_name" content="{{env('APP_NAME')}}" />
        <meta property="og:description" content="{{env('APP_NAME')}}" />

        <meta property="og:type" content="website" />
        <meta property="og:logo" content="{{asset('logo.png')}}" />
	@endpush
    @if(env('CONSULT_BKK'))
    {{env('CONSULT_BKK')}}result={{$client->type}}&color={{$client->level}}&symptom={{implode('::',$client->symptom) }}
    @endif
    <div class="shadow-lg grid max-w-md w-full justify-items-center">
        <div class="relative h-min">
            {{-- <img src="{{ asset('results/'.$client->id.'.jpg') }}" class="absolute right-full"/> --}}
        <x-approved-number/>
        <div class="z-30 absolute bottom-1 left-1 text-md">
        {{$client->member_code}}
        </div>
            <div id="result" >
            <img id="resultImg" src="{{asset('images/'.$image)}}"/>
            <span id="resultName" class="absolute top-[5.5%] left-[74%] {{$client->type=="HormonalAcne"?' text-black ' : ' text-white '}}">
                {{$client->name}}
            </span>
            </div>
            <span id="resultTex" class="absolute top-[63%] left-[7%] w-[53%] h-[33%] text-xs ">
                @foreach ($client->symptom as $a)
                - {{$a}}<br>
                @endforeach
            </span>
            <span id="btn" class="absolute top-[73%] left-[62%] w-[37%] h-[23%]">
                <x-button class="btn-0 !m-0 !w-full !p-2 min-h-[20%]" label="SAVE PHOTO" onclick="saveImg()" wire:click="clickTrack('save')" />
                @if ($agent->isDesktop())
                    <x-button class="btn-0 !m-0 !w-full !p-2 min-h-[20%] {{$element['color']}}"
                        {{-- onclick="DesktopShare()" --}}
                        href="{{ ShareButtons::currentPage(env('APP_NAME'), [
                                    'title' => env('APP_NAME'),
                                    'rel' => 'nofollow noopener noreferrer',
                                ])->facebook()->getRawLinks()['facebook'] }}"
                        wire:click="clickTrack('share')" >
                        <p class="relative">SHARE QUIZ
                            <i class="fa-brands fa-facebook"></i>

                            {{-- <span class="absolute -left-[1ch] w-auto"> 
                                <i class="fa-brands fa-facebook"></i>
                            </span> --}}
                        </p>
                    </x-button>
                @else                
                    <x-button class="btn-0 !m-0 !w-full !p-2 min-h-[20%] {{$element['color']}}" label="SHARE QUIZ" onclick="share()" wire:click="clickTrack('share')" />
                @endif 
                @if(env('CONSULT_URL'))
                    <x-button class="{{$element['btn']}} !m-0 !w-full !p-2 min-h-[70%] text-center" 
                    href="{{env('CONSULT_URL')}}{{base64_encode( asset('results/'.$client->id.'.jpg') )}}"
                    wire:click="clickTrack('consult')" >
                        ปรึกษาปัญหา <br>
                        สุขภาพผู้หญิง<br>
                        คลิก
                    </x-button>
                @elseif(env('CONSULT_BKK'))
                    <x-button class="{{$element['btn']}} !m-0 !w-full !p-2 min-h-[70%] text-center" 
                    href="{{env('CONSULT_BKK')}}result={{$client->type}}&color={{$client->level}}&symptom={{implode('::',$client->symptom) }}"
                    wire:click="clickTrack('consult')" >
                        ปรึกษาปัญหา <br>
                        สุขภาพผู้หญิง<br>
                        คลิก
                    </x-button>
                @endif
                {{-- <x-button label="Open" x-on:click="$openModal('shareModal')" wire:click="clickTrack('share')" primary /> --}}

                {{-- <x-button href="https://line.me/R/share?text={{urlencode(URL::current())}}" label='send line msg'/> --}}
                {{-- <x-button href="https://social-plugins.line.me/lineit/share?url={{urlencode(URL::current())}}&text=ข้อมูลของฉัน" label='send line msg 2'/> --}}


            </span>
            {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
        </div>
    </div>

    <canvas id="myCanvas" class="w-full hidden"></canvas>

    <x-modal name="shareModal" blur="base" z-index="10">
        <x-card title="Share Result">
            <p class="p-2">
                {{-- <span>{{URL::current()}}</span> --}}
                <x-button label="copy result" onclick="copyLink()"/>
            </p>
            
            
            {{-- <p class="p-2">
                <x-button label="facebook" 
                data-href="{{URL::current()}}" />
                <x-button label="twitter"/>
            </p> --}}
     
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <x-button flat label="Close" x-on:click="close" />
            </x-slot>
        </x-card>
    </x-modal>

    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script>
        let loadImageOnCanvasAndResizeCanvasToFitImage = async(canvas, imageUrl,text) => {
            // Get the 2D Context from the canvas
            let ctx = canvas.getContext("2d");

            // Create a new Image
            let img = new Image();

            // Setting up a function with the code to run after the image is loaded
            img.onload = async() => {
                // Once the image is loaded, we will get the width & height of the image
                let loadedImageWidth = img.width;
                let loadedImageHeight = img.height;

                // Set the canvas to the same size as the image.
                canvas.width = loadedImageWidth;
                canvas.height = loadedImageHeight;
				console.log("load canvas");

                //let font = new FontFace('myFont',"url('//fonts/DB\ HeaventRounded\ Bd\ v3.2.1.ttf')")
                //await font.load()
                //document.fonts.add(font)
				console.log("load font");
                ctx.font = "40px mitr"
                ctx.fillStyle = "{{$client->type=="HormonalAcne"?' text-black ' : ' text-white '}}";
                ctx.textAlign = "left";
                ctx.textBaseline = "top";
                // Draw the image on to the canvas.
                ctx.drawImage(img, 0, 0);
                ctx.fillText('{{$client->name??"-"}}', 740, 110);


                ctx.font = "24px mitr"

                // ctx.fillText("-{{$client->symptom[0]}}", 50, 1110);

                @foreach ($client->symptom as $i=>$a)

                    ctx.fillText(" {{$a}}", 50, 1110+({{$i}}*50));

                @endforeach

                let i = document.getElementById('resultImg');
                let t = document.getElementById('resultName');
                let t2 = document.getElementById('resultTex');
                t.classList.add('hidden')
                t2.classList.add('hidden')
                i.src=canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                data = canvas.toDataURL("image/png").replace(/^data:image\/(png|jpg);base64,/, "");
                // console.log(data)

				document.getElementById('btn').classList.remove('hidden')
                // document.body.appendChild(i)
                // alert(data);
                // Livewire.emit('testcomp')
				return ctx
            };
			//open images on new windows
  			//const win = window.open(dataUrl, '_blank');

			// Now that we have set up the image "onload" handeler, we can assign
            // an image URL to the image.
            
            img.src = imageUrl;
			return imageUrl;

            // console.log(img)
            // var a = document.createElement('a');
            // a.href = imageUrl;
            // a.download = 'result.jpg';
            // console.log('create element'+'a')
            // a.click();

        };

        // Run code after the page is loaded
        document.addEventListener("DOMContentLoaded", () => {
        // Setting up the canvas

            let theCanvas = document.getElementById("myCanvas");

            // Some image URL..
            let imageUrl ="{{asset('images/'.$image)}}";

            // Load image on the canvas & re-size the canvas based on the image size
            loadImageOnCanvasAndResizeCanvasToFitImage(theCanvas, imageUrl,"{{$client->name??"-"}}");
        });


        function saveImg(){
            let theCanvas = document.getElementById("myCanvas");
            // Some image URL..
			const a = document.createElement("a")
			document.body.appendChild(a)
			a.href = theCanvas.toDataURL('images/jpeg')
			a.download = "result.jpg"
			a.click()
			// document.body.removeChild(a)
        }

        const go_line = async()=>  {
			const canvas = document.getElementById('myCanvas');
			let canvasImg = canvas.toDataURL("image/jpeg", 1.0);
			// alert('test');
			// window.open(canvasImg, '_blank');
			// let canvasBlob = canvas.toBlob((blob) => window.open('https://miniapp.line.me/1656211306-JkY7zjyy/hormonal-quiz?img_url='+btoa(URL.createObjectURL(blob)), '_blank'));
			
			window.open('https://miniapp.line.me/1656211306-JkY7zjyy/hormonal-quiz?img_url='+btoa(canvasImg), '_blank');
			// canvas.toBlob((blob) => window.open(URL.createObjectURL(blob), '_blank'));
			// console.log('https://miniapp.line.me/1656211306-JkY7zjyy/hormonal-quiz?img_url='+canvasImg);
            
		}
		
        const copyLink = async()=>{
            try {
                await navigator.clipboard.writeText('{{URL::current()}}');
                $wireui.notify({
                    icon: 'success',
                    title: 'Link Coppied!',
                })
                console.log('Content copied to clipboard');
            } catch (err) {
                $wireui.notify({
                    icon: 'error',
                    title: 'Error!',
                })
                console.error('Failed to copy: ', err);
            }
        }
        const DesktopShare = async()=>  {
            $openModal('shareModal')
        }
        const share = async()=>  {
            if (!('share' in navigator)) {
                $openModal('shareModal')
                try {
                    await navigator.clipboard.writeText('{{URL::current()}}');
                    $wireui.notify({
                        icon: 'success',
                        title: 'Link Coppied!',
                    })
                    console.log('Content copied to clipboard');
                } catch (err) {
                    $wireui.notify({
                        icon: 'error',
                        title: 'Error!',
                    })
                    console.error('Failed to copy: ', err);
                }
                alert("Your browser doesn't support the Web Share API.")
            return
            }
            // `element` is the HTML element you want to share.
            // `backgroundColor` is the desired background color.
            const canvas = document.getElementById('myCanvas')
            canvas.toBlob(async (blob) => {
                // Even if you want to share just one file you need to
                // send them as an array of files.
                const files = [new File([blob], 'result.png', { type: blob.type })]
                const shareData = {
                    text: 'bayer quiz',
                    title: 'bayer quiz',
                    files,
                }
                if (navigator.canShare(shareData)) {
                    try {
                        await navigator.share(shareData)
                    } catch (err) {
                        if (err.name !== 'AbortError') {
                            console.error(err.name, err.message)
                        }
                    }
                } else {
                    const shareData = {
                        text: 'bayer quiz',
                        title: 'bayer quiz',
                        url: '{{route('home')}}',
                    }
                    console.warn('Sharing not supported', shareData)
                }
            })
        }

    </script>
</div>
