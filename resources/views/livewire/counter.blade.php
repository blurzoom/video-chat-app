<div>
    <div class="flex-col">
        <div class="mx-5 my-5 flex flex-row">
            <button
                class="mx-2 flex h-8 w-24 items-center justify-center rounded bg-red-600 text-white shadow transition-all hover:bg-red-500"
                wire:click="decrement"
            >
                <span class="material-icons">remove</span>
            </button>
            <h1 class="mx-2 flex items-center justify-center font-bold">
                {{ $count }}
            </h1>

            <button
                class="mx-2 flex h-8 w-24 items-center justify-center rounded bg-green-600 text-white shadow transition-all hover:bg-green-500"
                wire:click="increment"
            >
                <span class="material-icons">add</span>
            </button>
            <h2>{{$fio}}</h2>
        </div>
        <div class="w-[800px] h-[700px] min-h-content bg-gray-100 overflow-y-auto " id="container">docx</div>
        <div wire:loading class="loading shadow-lg">
            <div class="dot"></div>
            <div class="dot2"></div>
        </div>
    </div>
{{--        <script src="https://unpkg.com/promise-polyfill/dist/polyfill.min.js"></script>
    <!--lib uses jszip-->
        <script crossorigin="" src="https://unpkg.com/jszip/dist/jszip.min.js"></script>
        <script src="https://volodymyrbaydalka.github.io/docxjs/dist/docx-preview.umd.js"></script>--}}
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
            integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+"
            crossorigin="anonymous"></script>
    <script>

        const socket = io('http://172.144.1.203:3000');

        socket.on('online', function (count) {
            console.info('підключено: ', count)
        })
        socket.on('leave', function (id) {
            console.info('відключено: ', id)
        })

        socket.on('hi', function () {
            console.info('Welcome on our server!!')
        })
        socket.on("counter-add", (...args) => {
        console.log(args)
        })
        socket.on("CounterAdd", (...args) => {
        console.log(args)
        })

    </script>
    <script>
        // let docData = <document Blob>;
        let blob;
        fetch('http://video.test/docx')
            .then(response => response.blob())
            .then((myBlob) => {
                    // console.log(myBlob)
                    // const url = URL.createObjectURL(myBlob);
                    // console.log(url)
                    const container = document.getElementById("container");
                    docx.renderAsync(myBlob, container, null, {
                        "ignoreHeight": true,
                        "ignoreWidth": false,
                        "ignoreFonts": false,
                        "breakPages": true,
                        "debug": false,
                        "experimental": true,
                        "className": "docx",
                        "inWrapper": true,
                        "trimXmlDeclaration": true,
                        "ignoreLastRenderedPageBreak": true,
                        "renderHeaders": true,
                        "renderFooters": true,
                        "renderFootnotes": true,
                        "renderEndnotes": true,
                        "useBase64URL": false,
                        "useMathMLPolyfill": false,
                        "renderChanges": true,

                    })
                }
            )


    </script>
</div>
