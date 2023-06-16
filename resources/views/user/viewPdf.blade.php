<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Book</title>
    <style>
        body {
            overflow-x: hidden;
        }

        .buttonGrp {
            text-align: center;
            font-family: arial;
            padding-bottom: 30px;
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
        
    
            
          
var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');
    let scale = 3

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