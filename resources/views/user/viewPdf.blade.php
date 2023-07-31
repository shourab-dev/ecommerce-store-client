<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Book</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      overflow-x: hidden;
    }

    .buttonGrp {
      text-align: center;
      font-family: arial;
    }

    .buttonGrp span {
      font-size: 2rem;
      margin: 20px 0 10px;
      display: inline-block;
    }

    .buttonGrp .buttonLists {
      display: flex;
      justify-content: center;
    }

    .buttonGrp .buttonLists button {
      padding: 15px 23px;
      border: none;
      outline: none;
      outline: 1px solid #ddd;
    }

    .buttonGrp .buttonLists button:nth-child(1) {
      border-radius: 15px 0 0 15px;
    }

    .buttonGrp .buttonLists button:nth-child(2) {
      border-radius: 0px 15px 15px 0px;
    }

    .buttonGrp .buttonLists button:focus {
      background-color: dodgerblue;
      color: white;
    }

    canvas {

      margin: auto;
      display: block;
    }

    @media (max-width:600px) {
      canvas {
        width: 100vw;
      }
    }

    :root {
      --width: 300px;
    }

    input[type=range] {
      height: 25px;
      -webkit-appearance: none;
      margin: 10px 0;
      width: var(--width);
    }

    input[type=range]:focus {
      outline: none;
    }

    input[type=range]::-webkit-slider-runnable-track {
      width: var(--width);
      height: 5px;
      cursor: pointer;
      animate: 0.2s;
      box-shadow: 0px 0px 0px #000000;
      background: #2497E3;
      border-radius: 1px;
      border: 0px solid #000000;
    }

    input[type=range]::-webkit-slider-thumb {
      box-shadow: 0px 0px 0px #000000;
      border: 1px solid #2497E3;
      height: 18px;
      width: 18px;
      border-radius: 25px;
      background: #A1D0FF;
      cursor: pointer;
      -webkit-appearance: none;
      margin-top: -7px;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
      background: #2497E3;
    }

    input[type=range]::-moz-range-track {
      width: var(--width);
      height: 5px;
      cursor: pointer;
      animate: 0.2s;
      box-shadow: 0px 0px 0px #000000;
      background: #2497E3;
      border-radius: 1px;
      border: 0px solid #000000;
    }

    input[type=range]::-moz-range-thumb {
      box-shadow: 0px 0px 0px #000000;
      border: 1px solid #2497E3;
      height: 18px;
      width: 18px;
      border-radius: 25px;
      background: #A1D0FF;
      cursor: pointer;
    }

    input[type=range]::-ms-track {
      width: var(--width);
      height: 5px;
      cursor: pointer;
      animate: 0.2s;
      background: transparent;
      border-color: transparent;
      color: transparent;
    }

    input[type=range]::-ms-fill-lower {
      background: #2497E3;
      border: 0px solid #000000;
      border-radius: 2px;
      box-shadow: 0px 0px 0px #000000;
    }

    input[type=range]::-ms-fill-upper {
      background: #2497E3;
      border: 0px solid #000000;
      border-radius: 2px;
      box-shadow: 0px 0px 0px #000000;
    }

    input[type=range]::-ms-thumb {
      margin-top: 1px;
      box-shadow: 0px 0px 0px #000000;
      border: 1px solid #2497E3;
      height: 18px;
      width: 18px;
      border-radius: 25px;
      background: #A1D0FF;
      cursor: pointer;
    }

    input[type=range]:focus::-ms-fill-lower {
      background: #2497E3;
    }

    input[type=range]:focus::-ms-fill-upper {
      background: #2497E3;
    }

    body {
      position: relative;
    }

    .zoomButton {
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-bottom: 30px;

    }

    .zoomButton span {
      width: 30px;
      height: 30px;
      background-color: dodgerblue;
      color: white;
      margin: 0 5px;
      line-height: 30px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="buttonGrp">
    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
    <div class="buttonLists">
      <button id="prev">Previous</button>
      <button id="next">Next</button>
    </div>

  </div>
  <input type="hidden" value="{{ $id }}" name="id">
  <div class="zoomButton"><span>-</span><input type="range" id="zoom" min="0.8" max="5"><span>+</span></div>
  <canvas id="the-canvas"></canvas>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/devtools-detector/2.0.14/devtools-detector.js"
    integrity="sha512-ZiYgUI2NVB760mprMoZ2WTZ/KslDohbAm6QsGBmqpWDsVkJ2V7gEIAaQHj3/EutqpQWeryBiGHjg3JyWQ4EewQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"
    integrity="sha512-ml/QKfG3+Yes6TwOzQb7aCNtJF4PUyha6R3w8pSTo/VJSywl7ZreYvvtUso7fKevpsI+pYVVwnu82YO0q3V6eg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    let id = document.querySelector('input[type="hidden"]').value
        var url = `{{ route('user.myorder.book.pdf',":id") }}`;
        url = url.replace(':id', id)
        let zoom = document.querySelector('#zoom')
        
            
          
var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');
    let scale = 1
    

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    canvas.height = viewport.height;
    // canvas.width = window.innerWidth;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);
});
    


zoom.addEventListener('input', ()=> {scale = zoom.value; renderPage(pageNum)})

let btnsNode = document.querySelectorAll('.zoomButton span')
let btns = Array.from(btnsNode)
btns.map(btn=>{
  btn.addEventListener('click', (e)=>{
    
    if(e.target.innerHTML  == "+"){
      zoom.value = Number(zoom.value) + 1;
      console.log(zoom.value);
    } else{
      zoom.value = Number(zoom.value) - 1;
    }
    
    zoom.dispatchEvent(new Event('input'))
  })
})


  </script>
  
  <script>
    document.addEventListener('keydown', event => {
        console.log(`User pressed: ${event.key}`);
        event.preventDefault();
        return false;
        });
        document.addEventListener('contextmenu', event => event.preventDefault());
        let myCanvas = document.querySelector('canvas')
                devtoolsDetector.addListener(function(isOpen) {
                if(isOpen){
                    canvas.remove();
                }
                //* DO SOMETHING IF DEV TOOL IS OPEN
                
            });
           devtoolsDetector.launch();
  </script>
</body>

</html>