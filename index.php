<?
  $img = (isset($_GET['i']) && $_GET['i'] && strlen($_GET['i']) > 5) ? str_replace('https:/', 'https://', $_GET['i']) : 'https://jsbot.cantelope.org/uploads/295bRf.jpg';
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
    @font-face {
      font-family: 'alice';
      src:  url('Alice_in_Wonderland_3.woff2') format('woff2'),
            url('Alice_in_Wonderland_3.woff') format('woff');
    }
    body, html{
      margin: 0;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      background: #000;
    }
    canvas{
      border: 2px solid #486;
      position: absolute;
      top: 50%;
      left: 50%;
      background: url(./1HZmm6.png);
      background-color: #222;
      background-position: center center;
      background-size: 100% 100%;
      transform: translate(-50%, -50%);
    }
    .downloadLink{
      text-decoration: none;
      font-family: courier;
      font-size: 24px;
      color: #044;
      text-shadow: 1px 1px 1px #000;
      margin: 50px;
      padding: 10px;
      background: #0fa;
      display: inline-block;
      border-radius: 10px;
    }
    .newDiv{
      text-align: center;
    }
    .imgThumb{
      width: calc(100% - 50px);
      margin:25px;
    }
    #button{
      position:absolute;
      left:50%;
      top:50%;
      transform: translate(-50%,-50%);
      font-size: 24px;
    }
	</style>
  </head>
  <body>
    <button onclick="Draw()" id="button">Draw</button>
    <div style="font-family: alice;position:absolute; z-index:-100">a</div>
    <canvas id="c"></canvas>
  </body>
  <script>

    duration = window.location.href.toUpperCase().split('DURATION=')[1]
    if(typeof duration !== 'undefined' && duration.length){
      duration=+duration.split('&')[0]
    } else {
      duration = 1000*60|0
    }
    initialDelay = window.location.href.toUpperCase().split('DELAY=')[1]
    if(typeof initialDelay !== 'undefined' && initialDelay.length){
      initialDelay=+initialDelay.split('&')[0]
    } else {
      initialDelay = 4000
    }
    vars=0
    song = './epiphany.mp3'
    vid = ''
    stage2 = false
    export_base = true
    fftSize = 128
    visualization = 13
    autoStart = 1

    recordingStarted=playing=vidplaying=analyzerSetup=0
    canvas2 = document.querySelector("#c")
    canvas2.width = 1920|0
    canvas2.height = 1080|0
    x2 = canvas2.getContext('2d')
    c = canvas2.cloneNode()
    c.id = 'canvas2'
    c.style.visibility = 'hidden'
    c.style.position = 'absolute'
    document.body.appendChild(c)
    c.width=1920
    c.height=1080
    c.style.width='calc(' + 1920 + 'px - 10px)'
    c.style.height='calc(' + 1080 + 'px - 10px)'


    //c.style.display='none'
    x = c.getContext('2d')
    C = Math.cos
    S = Math.sin
    t = 0
    T = Math.tan

    rsz=window.onresize=()=>{
      setTimeout(()=>{
        if(document.body.clientWidth > document.body.clientHeight*1.77777778+1|0){
          c.style.height = 'calc(100vh - 40px)'
          setTimeout(()=>c.style.width = 'calc(' + (c.clientHeight*1.77777778+1|0)+'px)',0)
        }else{
          c.style.width = 'calc(100vw - 40px)'
          setTimeout(()=>c.style.height = 'calc(' + (c.clientWidth/1.77777778+1|0)+'px)',0)
        }
        c.width=1920
        c.height=c.width/1.777777778+1|0
        if(document.body.clientWidth > document.body.clientHeight*1.77777778+1|0){
          canvas2.style.height = 'calc(100vh - 40px)'
          setTimeout(()=>canvas2.style.width = 'calc(' + (canvas2.clientHeight*1.77777778+1|0)+'px)',0)
        }else{
          canvas2.style.width = 'calc(100vw - 40px)'
          setTimeout(()=>canvas2.style.height = 'calc(' + (canvas2.clientWidth/1.77777778+1|0)+'px)',0)
        }
        canvas2.width=c.width
        canvas2.height=canvas2.width/1.777777778+1|0
      },0)
      redraw=true
    }
    rsz()

    async function Draw(){

      if(!t){
        var srcimg = "<?=$img?>"
        R=(Rl,Pt,Yw,m)=>{X=S(p=(A=(M=Math).atan2)(X,Y)+Rl)*(d=(H=M.hypot)(X,Y)),Y=C(p)*d,Y=S(p=A(Y,Z)+Pt)*(d=H(Y,Z)),Z=C(p)*d,X=S(p=A(X,Z)+Yw)*(d=H(X,Z)),Z=C(p)*d;if(m)X+=oX,Y+=oY,Z+=oZ}
        I=(A,B,M,D,E,F,G,H)=>(K=((G-E)*(B-F)-(H-F)*(A-E))/(J=(H-F)*(M-A)-(G-E)*(D-B)))>=0&&K<=1&&(L=((M-A)*(B-F)-(D-B)*(A-E))/J)>=0&&L<=1?[A+K*(M-A),B+K*(D-B)]:0
        Q=q=>[c.width/2+X/Z*1e3,c.height/2+Y/Z*1e3]
        Rn=Math.random
        document.querySelector('#button').style.display='none'
        x.lineJoin=x.lineCap='butt'
      }

      if(stage2){
        if(song){
          analyzerSetup||setupAnalyzerAndContent()
        }else{
          loaded=1
        }
      } else { //base animation (pre freq)


      if(!t){
        modes = []
        window.location.href.split('?').map(v=>{
          v.split('&').map(q=>{
            modes.push(q)
          })
        })
        HSVFromRGB = (R, G, B) => {
          let R_=R/256
          let G_=G/256
          let B_=B/256
          let Cmin = Math.min(R_,G_,B_)
          let Cmax = Math.max(R_,G_,B_)
          let val = Cmax //(Cmax+Cmin) / 2
          let delta = Cmax-Cmin
          let sat = Cmax ? delta / Cmax: 0
          let min=Math.min(R,G,B)
          let max=Math.max(R,G,B)
          let hue = 0
          if(delta){
            if(R>=G && R>=B) hue = (G-B)/(max-min)
            if(G>=R && G>=B) hue = 2+(B-R)/(max-min)
            if(B>=G && B>=R) hue = 4+(R-G)/(max-min)
          }
          hue*=60
          while(hue<0) hue+=360;
          while(hue>=360) hue-=360;
          return [hue, sat, val]
        }

        RGBFromHSV = (H, S, V) => {
          while(H<0) H+=360;
          while(H>=360) H-=360;
          let C = V*S
          let X = C * (1-Math.abs((H/60)%2-1))
          let m = V-C
          let R_, G_, B_
          if(H>=0 && H < 60)    R_=C, G_=X, B_=0
          if(H>=60 && H < 120)  R_=X, G_=C, B_=0
          if(H>=120 && H < 180) R_=0, G_=C, B_=X
          if(H>=180 && H < 240) R_=0, G_=X, B_=C
          if(H>=240 && H < 300) R_=X, G_=0, B_=C
          if(H>=300 && H < 360) R_=C, G_=0, B_=X
          let R = (R_+m)*256
          let G = (G_+m)*256
          let B = (B_+m)*256
          return [R,G,B]
        }
        hexToRGBA=q=>{
          q=q.replace('#', '')
          let l=q.length
          if(l!=3 && l!=4 && l!==6 && l!=8) return
          let red, green, blue, alpha, red_, green_, blue_, alpha_
          switch(l){
            case 3:
              red_     = q[0]+q[0]
              green_   = q[1]+q[1]
              blue_    = q[2]+q[2]
              alpha    = 255
            break
            case 4:
              red_     = q[0]+q[0]
              green_   = q[1]+q[1]
              blue_    = q[2]+q[2]
              alpha_   = q[3]+q[3]
              alpha    = +("0x"+alpha_)
            break
            case 6:
              red_     = q[0]+q[1]
              green_   = q[2]+q[3]
              blue_    = q[4]+q[5]
              alpha    = 255
            break
            case 8:
              red_     = q[0]+q[1]
              green_   = q[2]+q[3]
              blue_    = q[4]+q[5]
              alpha_   = q[6]+q[7]
              alpha    = +("0x"+alpha_)
            break
          }
          red    = +("0x"+red_)
          green  = +("0x"+green_)
          blue   = +("0x"+blue_)
          return [red, green, blue, alpha]
        }
        R=(Rl,Pt,Yw,m)=>{X=S(p=(A=(M=Math).atan2)(X,Y)+Rl)*(d=(H=M.hypot)(X,Y)),Y=C(p)*d,Y=S(p=A(Y,Z)+Pt)*(d=H(Y,Z)),Z=C(p)*d,X=S(p=A(X,Z)+Yw)*(d=H(X,Z)),Z=C(p)*d;if(m)X+=oX,Y+=oY,Z+=oZ}
        Q=()=>[c.width/2+X/Z*900,c.height/2+Y/Z*900]
        for(CB=[],j=6;j--;)for(i=4;i--;)CB=[...CB,[(a=[S(p=Math.PI*2/4*i+Math.PI/4),C(p),2**.5/2])[j%3]*(l=j<3?-1:1),a[(j+1)%3]*l,a[(j+2)%3]*l]]
        s=window.location.href.split('jpg=')[1]
        if(typeof s !== 'undefined' && s.length){
          s=s.split('&')[0]
					console.log(s)
          asset=s=='none'?'/proxy.php?url=https://jsbot.cantelope.org/uploads/1My5Vq.png':'/proxy.php?url='+s
        } else {
          if(srcimg.length){
            asset='/proxy.php?url='+srcimg
          }else{
            asset='/proxy.php?url=https://jsbot.cantelope.org/uploads/295bRf.jpg'
          }
        }
        if(asset.indexOf('.mp4')!==-1 || asset.indexOf('.webm')!==-1){
          jpg = document.createElement('video')
					jpg.loop = true
					jpg.muted = true
					jpgIsVid=true
        }else{
					jpgIsVid=false
					jpg=new Image()
				}
        go___=false
        jpg[jpgIsVid?'oncanplaythrough':'onload']=e=>{
          console.log(2)
					if(jpgIsVid) jpg.play()
					//setTimeout(()=>{
          buffer___ = document.createElement('canvas')
          buffer___.width=1920
          buffer___.height=1080
          bctx = buffer___.getContext('2d')
          if(jpgIsVid){
            jpg.play()
            vid=e.path[0]
						//console.log(vid.videoWidth,vid.videoHeight)
            if(vid.videoWidth/vid.videoHeight>1.7777777778){
              w_=1920*1.3
              h_=1920/(vid.videoWidth/vid.videoHeight)*1.3
            } else {
              w_=1080*(vid.videoWidth/vid.videoHeight)*1.3
              h_=1080*1.3
            }
					}else{
            if(jpg.width/jpg.height>1.7777777778){
              w_=1920
              h_=1920*(jpg.width/jpg.height)
            } else {
              w_=1080*(jpg.width/jpg.height)
              h_=1080
            }
					}

          cycle           = 0
          color_offset    = 0
          brightness      = 0
          saturation      = .5
          contrast        = 0
          psychedelicize  = 0
          invert          = false
          monochrome      = false

          intensities={
            wavey: .75,
            twirl: .5,
            vignette: .5,
            scanlines: .9,
            matrix: .9,
            cycle,
            color_offset,
            brightness,
            saturation,
            contrast,
            psychedelicize,
            invert,
            monochrome,
          }
          modes=modes.map(v=>{
            v=(l=v.split('='))[0]
            if(l.length>1 && typeof +l[1] == 'number') intensities[v] = +l[1]
            return v
          })
          cycle           = intensities['cycle']
          color_offset    = intensities['color_offset']
          brightness      = intensities['brightness']
          saturation      = intensities['saturation']
          contrast        = intensities['contrast']
          psychedelicize  = intensities['psychedelicize']
          invert          = intensities['invert']
          monochrome      = intensities['monochrome']
          modes = [...new Set(modes)]
          if(modes.indexOf('matrix') !== -1) modes = modes.filter(v=>v!='scanlines')
          if(modes.indexOf('twirl') !== -1) modes = modes.filter(v=>v!='wavey')

          getMask=()=>{
            bctx.clearRect(0,0,1920,1080)
						bctx.globalAlpha=1
            bctx.drawImage(jpg,960-w_/2,540-h_/2,w_,h_)
						//bctx.globalAlpha=1
            data = bctx.getImageData(0,0,buffer___.width,buffer___.height)
            l=data.data
            for(i=0;i<l.length;i+=4){
              red   = l[i+0]
              green = l[i+1]
              blue  = l[i+2]
              alpha = l[i+3]

              diff=(Math.abs(red-tgtRGBA[0])+Math.abs(green-tgtRGBA[1])+Math.abs(blue-tgtRGBA[2]))/3
              if(invert){
                alpha = diff>tol?0:255
             } else {
                alpha = diff>tol?255:0
              }
              //l[i+0] = red
              //l[i+1] = green
              //l[i+2] = blue
              //l[i+3] = alpha

              if(invert) {
                red = 255-red
                green = 255-green
                blue = 255-blue
              }
              let hue, sat, lum;
              [hue, sat, lum] = HSVFromRGB(red, green, blue);
              if(color_offset) {
                hue+=color_offset
              }
              if(cycle) {
                hue += t*60*cycle
              }
              if(saturation) {
                sat *= (1+saturation)
                let del1 = -saturation/2+.5
                let del2 = 1-saturation
                //lum = .5*del1+lum*del2
                lum=saturation<0?.5*sat+lum*(1-sat):lum
                sat = sat*((1+saturation)/2)
              }
              if(brightness) {
                lum += brightness/1.25-1/4
                sat -= brightness/2
              }
              if(contrast){
                let del=(1+contrast)
                del2=(1+contrast)/2
                s=(1.05*(contrast+1))/(1.05-contrast)
                lum=contrast<=0?.5*(1-del)+lum*del:((s*(lum-.5))+.5)*(1-sat)+sat*lum
                s=360/6*contrast
                hue=contrast<=0?hue:(hue/s+.5|0)*s
                sat=contrast<=0?del*sat+(sat*(1-del))*del:sat//*del2
              }
              if(psychedelicize){
                sat=saturation
                hue+=lum*(100*psychedelicize)**3/600
              }
              [red, green, blue] = RGBFromHSV(hue, sat, lum);
              if(monochrome){
                val=(red+green+blue)/3
                red=val
                green=val
                blue=val
              }

              l[i+0] = red|0
              l[i+1] = green|0
              l[i+2] = blue|0
              l[i+3] = alpha|0


            }
            bctx.putImageData(data,0,0)
            go___=true
					}
					getMask()
        }
        tolerance=window.location.href.toUpperCase().split('TOLERANCE=')[1]
        if(typeof tolerance !== 'undefined' && tolerance.length){
          tolerance = tolerance.split('&')[0]
          tol=tolerance
        } else {
          tol=100
        }
        invert=window.location.href.toUpperCase().split('INVERT=')[1]
        if(typeof invert !== 'undefined'){
          invert=invert.split('&')[0]
          invert=!!(+invert)
        } else {
          invert=false
        }
        tgtcol=window.location.href.toUpperCase().split('TGTCOL=')[1]
        if(typeof tgtcol !== 'undefined' && tgtcol.length){
          tgtcol=tgtcol.split('&')[0]
          tgt_col=tgtcol
        } else {
          tgt_col='#eab29c'
        }
        animationStyle=window.location.href.toUpperCase().split('ANIMATIONSTYLE=')[1]
        if(typeof animationStyle !== 'undefined' && animationStyle.length){
          animationStyle=+animationStyle.split('&')[0]
        } else {
          animationStyle=0
        }
        slug=window.location.href.split('slug=')[1]
        if(typeof slug!== 'undefined' && slug.length){
          slug=slug.split('&')[0]
          animationStyle=2
          url='proxyJson.php?url=https://code.dweet.net/raw.php?slug=' + slug
          await fetch(url).then(res=>res.json()).then(data=>{
            chosenDemo = data
          })
        }
        tgtRGBA=hexToRGBA(tgt_col)
				jpg.src=asset
      }

      switch(animationStyle){
        case 0:
          if(!t){
            for(a=[1,1],i=40;i--;)a=[...a,a[l=a.length-1]+a[l-1]]
            phi = a[l+1]/a[l]

            rects=Array(3).fill().map((v,i)=>{
              a=[]
              a=[...a, [-phi/2, -.5, 0]]
              a=[...a, [phi/2,  -.5, 0]]
              a=[...a, [phi/2,  .5,  0]]
              a=[...a, [-phi/2, .5,  0]]
              a=a.map(q=>{
                X=q[0], Y=q[1], Z=q[2]
                switch(i){
                  case 0: R(Math.PI/2,0,0); break
                  case 1: R(Math.PI/2,Math.PI/2,Math.PI/2); break
                  case 2: R(0,0,Math.PI/2); break
                }
                return [X,Y,Z]
              })
              return a
            })
            facets=[[[0,0], [2,2], [0,3]],[[1,2], [2,2], [0,3]],[[1,2], [2,2], [2,1]],[[1,2], [0,2], [2,1]],[[2,1], [0,1], [1,3]],[[2,1], [2,2], [1,3]],[[2,1], [0,1], [0,2]],[[1,2], [1,1], [0,2]],[[0,2], [0,1], [2,0]],[[0,2], [2,0], [1,1]],[[2,3], [2,0], [1,1]],[[2,3], [2,0], [1,0]],[[0,1], [2,0], [1,0]],[[0,1], [1,3], [1,0]],[[0,0], [1,3], [1,0]],[[0,0], [2,3], [1,0]],[[0,0], [2,3], [0,3]],[[1,1], [2,3], [0,3]],[[1,1], [1,2], [0,3]],[[0,0], [2,2], [1,3]]]

            shp=[]
            facets.map(n=>{
              a=[]
              n.map(q=>{
                v=rects[q[0]][q[1]]
                X=v[0]
                Y=v[1]
                Z=v[2]
                a=[...a, [X,Y,Z]]
              })
              shp=[...shp, a]
            })

            subdivide = () =>{
              subdivisions=[]
              new_shp=[]
              shp.map((v,i,a)=>{
                a=[]
                v.map((q,j)=>{
                  X1=q[0]
                  Y1=q[1]
                  Z1=q[2]
                  X2=v[l=(j+1)%3][0]
                  Y2=v[l][1]
                  Z2=v[l][2]
                  mx=(X1+X2)/2
                  my=(Y1+Y2)/2
                  mz=(Z1+Z2)/2
                  a=[...a, [mx,my,mz]]
                })
                subdivisions=[...subdivisions, a]
                v.map((q,j)=>{
                  b=[]
                  for(m=1;m--;){
                    b=[...b, [...v[(j+1)%3]], [...a[(m+j)%3]], [...a[(m+j+1)%3]]]
                  }
                  subdivisions=[...subdivisions, b]
                })
              })
              shp=[...new_shp, ...subdivisions]      
            }

            subdivisions=3
            for(let m = subdivisions; m--;)subdivide()
            base_shp=JSON.parse(JSON.stringify(shp))

            expansion=10+10*S(t*2)
            ls=.1/(20+expansion)*270
            shps=[]
            shps=[...shps, ((base_shp.map(v=>{
              v=v.map(q=>{
                X1=q[0]
                Y1=q[1]
                Z1=q[2]
                d=Math.hypot(X1,Y1,Z1)
                X2=X1/d
                Y2=Y1/d
                Z2=Z1/d
                X=(X2*expansion+(X1*(1-expansion)))*ls
                Y=(Y2*expansion+(Y1*(1-expansion)))*ls
                Z=(Z2*expansion+(Z1*(1-expansion)))*ls
                return [X,Y,Z]
              })
              return v
            })))]
            expansion=S(t*4)*1-2
            ls=1.5
            shps=[...shps, ((base_shp.map(v=>{
              v=v.map(q=>{
                X1=q[0]
                Y1=q[1]
                Z1=q[2]
                d=Math.hypot(X1,Y1,Z1)
                X2=X1/d
                Y2=Y1/d
                Z2=Z1/d
                X=(X2*expansion+(X1*(1-expansion)))*ls
                Y=(Y2*expansion+(Y1*(1-expansion)))*ls
                Z=(Z2*expansion+(Z1*(1-expansion)))*ls
                return [X,Y,Z]
              })
              return v
            })))]
          }
          if(go___){
            x.lineJoin=x.lineCap='butt'
            Rl=0,Pt=-4,Yw=t
            oX=0,oY=0,oZ=3.5

            x.globalAlpha=1
            x.fillStyle='#0008'
            x.fillRect(0,0,c.width,c.height)

            shps.map(shp=>{
             shp.map(n=>{
                x.beginPath()
                ax=ay=az=0
                n.map(q=>{
                  v=q
                  X=v[0]
                  Y=v[1]
                  Z=v[2]
                  ax+=X
                  ay+=Y
                  az+=Z
                  R(Rl,Pt,Yw,1)
                  x.lineTo(...Q())
                })
                ax/=n.length
                ay/=n.length
                az/=n.length
                x.closePath()
                x.lineWidth=70/(Z**1.5)
                x.strokeStyle=`hsla(${(l=H(ax,ay,az)*200)*1-t*200},99%,${100-l**3.5/80000000}%,.2)`
                x.stroke()
                x.lineWidth/=5
                x.lineWidth|=0
                x.strokeStyle='#fff3'
                //x.stroke()
                //x.fillStyle=`hsla(${(l=H(ax,ay,az)*200)*2-t*200},99%,${100-l**3.5/100000000}%,.1)`
                //x.fill()
              })
            })
            x.globalAlpha=1
            //if(go___) x.drawImage(buffer___,0,0,c.width,c.height)      
          }
        break
        case 1:
          if(!t){
            keys=Array(256).fill(0)
            window.onkeydown=e=>{
              e.preventDefault()
              e.stopPropagation()
              if(e.keyCode-48>=0 && e.keyCode-48<10) focus_idx=e.keyCode-48
              keys[e.keyCode]=true
            }
            window.onkeyup=e=>{
              e.preventDefault()
              e.stopPropagation()
              keys[e.keyCode]=false
            }
            Rn = Math.random
            NPC_vel = 3
            player_vel=NPC_vel*8
            NPC_turn_vel=.05
            B=Array(100).fill().map(v=>{
              X = (Rn()-.5) * c.width
              Y = (Rn()-.5) * c.width
              direction = Rn()*Math.PI*2
              return [X, Y, direction, 0]
            })
            P=Array(10).fill().map(v=>{
              X = 0
              Y = 0
              direction = Rn()*Math.PI*2
              return [X, Y, direction, 0]
            })
            
            Q=(X,Y,r)=>{
              let a, b
              let p=Math.atan2(a=X-c.width/2, b=Y-c.height/2)-(r?P[focus_idx][2]:0)+Math.PI
              let d=Math.hypot(a,b)
              X=c.width/2+S(p)*d
              Y=c.height/2+C(p)*d
              return [X, Y]
            }

            focus_idx=0
          }
          if(go___){
            x.globalAlpha=1
            x.fillStyle='#0008'
            x.fillRect(0,0,c.width,c.height)
            P.map((v, i)=>{
              v[3]/=i==focus_idx?1.5:1.02
              v[2]+=v[3]
              if(i!==focus_idx){
                vx = S(v[2])*NPC_vel
                vy = C(v[2])*NPC_vel
                v[3]+=(Rn()-.5)*NPC_turn_vel
              } else {
                vx=0, vy=0
                if(keys[37]){
                  v[3]+=NPC_turn_vel
                }
                if(keys[38]){
                  vx = S(v[2])*player_vel
                  vy = C(v[2])*player_vel
                }
                if(keys[39]){
                  v[3]-=NPC_turn_vel
                }
                if(keys[40]){
                  vx = -S(v[2])*player_vel
                  vy = -C(v[2])*player_vel
                }
              }
              X = c.width/2 + (v[0] += vx)
              Y = c.height/2 + (v[1] += vy)
              if(v[0] > c.width/2) v[0] -= c.width
              if(v[0] < -c.width/2) v[0] += c.width
              if(v[1] > c.width/2) v[1] -= c.width
              if(v[1] < -c.width/2) v[1] += c.width
              x.fillStyle='#0ff3'
              s=50
              if(i==focus_idx){
                cx = X-c.width/2, cy = Y-c.height/2
              }
              l=Q(X-cx, Y-cy, 1)
              x.fillRect(l[0]-s/2,l[1]-s/2, s, s)
              x.fillStyle='#0ff'
              s/=3
              l=Q(X-cx, Y-cy, 1)
              x.fillRect(l[0]-s/2,l[1]-s/2, s, s)

              x.fillStyle='#fff'
              x.font='70px courier'
              x.fillText(i,l[0]+20, l[1]+40)

              x.beginPath()
              X=v[0]+c.width/2
              y=v[1]+c.height/2
              tx=S(p=i==focus_idx?0:v[2])
              ty=C(p)
              x.lineTo(...Q(X-tx*50-cx,Y-ty*50-cy, i!=focus_idx))
              x.lineTo(...Q(X+tx*100-cx,Y+ty*100-cy, i!=focus_idx))
              x.strokeStyle='#0ff'
              x.lineWidth=10
              x.stroke()
            })

            B.map(v=>{
              v[3]+=(Rn()-.5)*NPC_turn_vel
              v[3]/=1.1
              vx = S(v[2]+=v[3])*NPC_vel
              vy = C(v[2])*NPC_vel
              X = c.width/2 + (v[0] += vx)
              Y = c.height/2 + (v[1] += vy)
              if(v[0] > c.width/2) v[0] -= c.width
              if(v[0] < -c.width/2) v[0] += c.width
              if(v[1] > c.width/2) v[1] -= c.width
              if(v[1] < -c.width/2) v[1] += c.width
              x.fillStyle='#fff3'
              s=25
              l=Q(X-cx, Y-cy, 1)
              x.fillRect(l[0]-s/2,l[1]-s/2, s, s)
              x.fillStyle='#fff'
              s/=3
              l=Q(X-cx, Y-cy, 1)
              x.fillRect(l[0]-s/2,l[1]-s/2, s, s)

              x.beginPath()
              X=v[0]+c.width/2
              y=v[1]+c.height/2
              tx=S(p=v[2])
              ty=C(p)
              x.lineTo(...Q(X-tx*25-cx,Y-ty*25-cy, 1))
              x.lineTo(...Q(X+tx*50-cx,Y+ty*50-cy, 1))
              x.strokeStyle='#f00'
              x.lineWidth=3
              x.stroke()
            })

            x.beginPath()
            for(i=4;i--;){
              X=S(p=Math.PI*2/4*i+Math.PI/4)*c.width
              Y=C(p)*c.width
              q=Math.atan2(X,Y)//-P[focus_idx][2]
              d=Math.hypot(X,Y)
              X=S(q)*d/2**.5
              Y=C(q)*d/2**.5
              x.lineTo(...Q(c.width/2+X-cx,c.height/2+Y-cy, 1))
            }
            x.strokeStyle='#f00'
            x.closePath()
            x.lineWidth=20
            x.stroke()
          }
        break
        case 2:
          if(!t){
            goCustom = false
            if(typeof chosenDemo !== 'undefined'){
              customJS = chosenDemo.demoJS.split('Draw=()=>{')
              if(customJS.length){
                customJS = customJS[1].split('}')
                customJS.pop()
                customJS = customJS.join('}').split('t+=1/60')[0]
                goCustom = true
              }
            }
            let src = `function bypass_eval(){` + customJS + `}`
            let script = document.createElement('script')
            script.innerHTML = src
            document.body.appendChild(script)
            bypass_eval()
          }
          if(goCustom && go___){
            bypass_eval()
          }
        break
      }
      if(go___){
				if(1||jpgIsVid)getMask()
        x.globalAlpha=1//.5+S(t)/2
        x.drawImage(buffer___,0,0,c.width,c.height)
				x.globalAlpha=1
      }else{
        x.globalAlpha=1
        x.fillStyle='#0008'
        x.fillRect(0,0,c.width,c.height)
      }


        t+=1/60
      }


      x2.clearRect(0,0,canvas2.width|=0,canvas2.height)
      //x2.save()
      //x2.translate(canvas2.width / 2, canvas2.height / 2)
      //x2.rotate(0)

      sc = 1
      //x2.drawImage(c, -canvas2.width/2*sc, -canvas2.height/2*sc, canvas2.width*sc, canvas2.height*sc)
      x2.drawImage(c,0,0,canvas2.width,canvas2.height)
      //x2.restore()
      requestAnimationFrame(Draw)
    }

    setupAnalyzerAndContent = () =>{
      analyzerSetup=1
      if(!recordingStarted){
        x.lineCap=x.lineJoin='round'
        loaded=0
        mp3 = new Audio()
        mp3.src = song
        if(!mp3)loaded=1
        mp3.addEventListener('canplay',()=>{
          if(!playing){
            loaded=playing=1
            audioCtx = new (window.AudioContext || window.webkitAudioContext)()
            analyser = audioCtx.createAnalyser()
            source = audioCtx.createMediaElementSource(mp3)
            source.connect(analyser)
            analyser.connect(audioCtx.destination)
            analyser.fftSize=fftSize
            trim=analyser.fftSize*.25
            bufferLength = analyser.frequencyBinCount
            mp3.loop = true
            mp3.play()
            if(vid){
              bgvid = document.createElement('video')
              bgvid.src = vid
              bgvid.addEventListener('canplay',()=>{
                if(!vidplaying){
                  vidplaying=1
                  bgvid.loop=true
                  bgvid.play()
                }
              })
            }
          }
        })
      }
    }


    startRecording = () => {
      console.log('recording started')
      recordingStarted=1
      const chunks = []
      const stream = canvas2.captureStream()
      const rec = new MediaRecorder(stream, {videoBitsPerSecond:12000000})
      rec.ondataavailable = e => chunks.push(e.data);
      rec.onstop = e => exportVid(new Blob(chunks, {type: 'video/webm'}));
      rec.start();
      setTimeout(()=>{
        rec.stop()
        canvas2.style.display='none'
        setTimeout(()=>{
          document.querySelectorAll('video').forEach(v=>{
            v.style.display = 'none'
          })
        },200)
        canvas2.style.display='none'
        console.log('recording stopped')
      }, duration);
    }

    exportVid = (blob) => {
      const vid = document.createElement('video')
      vid.src = URL.createObjectURL(blob)
      vid.controls = true
      document.body.appendChild(vid)
      const a = document.createElement('a')
      a.download = 'myvid.webm'
      a.href = vid.src
      a.className='downloadLink'
      a.textContent = 'download the video'
      a.onclick=()=>{
        open(vid.src)
      }
      document.body.appendChild(a)
    }
  
    if(stage2) Draw()
    if(!stage2){
      Draw()
      if(export_base) setTimeout(()=>startRecording(), initialDelay)
    }

  </script>
</html>


