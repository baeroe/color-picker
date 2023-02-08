import React, {useEffect, useRef} from 'react'
import InputNumber from 'react-input-number';
import {default as RcSlider} from 'rc-slider';
import 'rc-slider/assets/index.css'

const Slider = (props) => {
    const {
        name, 
        min, 
        max, 
        onChange, 
        value
    } = props

    function changeInputManually(e) {
        var val = e.target.value
        if (val > 255) {
            onChange(255)
            e.target.value = 255
            return
        }

        if (val < 0) {
            onChange(0)
            e.target.value = 0
            return
        }
        onChange(val)
    }

    return (
        <div className="mb-4">
            <div className="flex items-center mb-1">
                <label htmlFor={name} className="block text-sm font-medium mr-2 text-white">{name}</label>
                <InputNumber 
                    min={min}
                    max={max}
                    value={value}
                    onBlur={changeInputManually}
                    className="w-10 outline-none text-white shadow-sm border border-slate-200 focus:shadow-inner focus:border focus:border-slate-600 focus:bg-slate-500 bg-slate-700 rounded border border-transparent px-1" 
                />
            </div>
            <RcSlider 
                id={name} 
                min={parseInt(min)} 
                max={parseInt(max)} 
                value={value}
                onChange={onChange}
            />
        </div>
    )
}

export default Slider