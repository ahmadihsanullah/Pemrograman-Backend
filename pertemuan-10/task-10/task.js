/**
 * Fungsi untuk menampilkan hasil download
**/
  const showDownload = (result) => {
    console.log("Download selesai");
    console.log("Hasil Download: " + result);
  }
  
  /**
   * Fungsi untuk download file
   * Function callback show
   */

  const download = (callShowDownload) => {
    return new Promise((resolve) => {
        setTimeout(()=>{
            const result = "Windows-10.exe";
            resolve(callShowDownload(result))
        },3000)
    })
  }
  
  // membuat fungsi utama: main
  const main = async () => {
    console.log(await download(showDownload));
  }
  
  main();
  
  /**
   * TODO:
   * - Refactor callback ke Promise atau Async Await
   * - Refactor function ke ES6 Arrow Function
   * - Refactor string ke ES6 Template Literals
   */