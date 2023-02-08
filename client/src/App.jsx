import { useState } from 'react'
import ColorPicker from './components/ColorPicker.jsx' 
import ColorList from './components/ColorList.jsx'
import { getRandomRBGValue } from './common/functions.js'

function App() {

  const [red, setRed] = useState(getRandomRBGValue())
  const [green, setGreen] = useState(getRandomRBGValue())
  const [blue, setBlue] = useState(getRandomRBGValue())

  function handleRandomColor() {
    setRed(getRandomRBGValue())
    setGreen(getRandomRBGValue())
    setBlue(getRandomRBGValue())
  }

  return (
    <div className="bg-slate-900 p-5 min-h-screen">
      <h1 className="w-full text-center mb-5 text-3xl text-slate-900 text-white">Color picker</h1>
      <div className="w-5/6 mx-auto bg-slate-700 rounded p-5 shadow">
        <ColorPicker 
          red={red}
          green={green}
          blue={blue}
          onChangeRed={(e) => setRed(e)} 
          onChangeGreen={(e) => setGreen(e)} 
          onChangeBlue={(e) => setBlue(e)} 
          onRandomColor={handleRandomColor}
        />        
        <ColorList 
          red={red}
          green={green}
          blue={blue}
        />
      </div>
      
    </div>
  )
}

export default App
