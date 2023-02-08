import React, { useState, useEffect } from 'react'
import ColorItem from './ColorItem.jsx'
import useApiService from '../services/ApiService.js'
 
const ColorList = (props) => {

    const apiService = useApiService()
    const { red, green, blue } = props
    const [colorList, setColorList] = useState([])
    const [colorName, setColorName] = useState("")

    useEffect(() => {
      loadColorList()
    }, [])

    function loadColorList() {
        apiService.getColors()
        .then(res => {
            console.log(res)
            setColorList(res.data)
        })
        .catch(err => {
            console.log(err)
        })
    }

    function saveColor() {
        apiService.postColor(red, green, blue, colorName)
        .then(res => {
            loadColorList()
        })
        .catch(err => {
            console.log(err)
        })
    }

    function deleteColor(id) {
        apiService.deleteColor(id)
        .then(res => {
            loadColorList()
        })
        .catch(err => {
            console.log(err)
        }) 
    }

    return (
        <div className="mt-10 flex flex-col">
            <label htmlFor="colorname" className="text-sm text-white mb-1">Name:</label>
            <div>
                <input 
                    id="colorname" 
                    type="text"    
                    onChange={(e) => setColorName(e.target.value)} 
                    className="shadow-inner py-1 px-2 bg-slate-500 text-white border border-slate-600 outline-none rounded-tl rounded-bl" 
                />
                <button 
                    onClick={saveColor} 
                    disabled={colorName.trim() == ""} 
                    className="bg-sky-300 disabled:bg-sky-300/50 disabled:border-sky-300/50 disabled:cursor-not-allowed py-1 px-2 rounded-tr rounded-br shadow border border-sky-300 text-white"
                >
                    Save
                </button>
            </div>

            <div className={`flex mt-5 flex-wrap`}>
                {colorList.map(item => (
                    <ColorItem item={item} deleteColor={deleteColor} key={item.id} />
                ))}
            </div>
        </div>
    )
}




export default ColorList