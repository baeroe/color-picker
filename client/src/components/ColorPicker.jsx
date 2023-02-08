import React from "react";
import Slider from "./Slider.jsx";
import { getRGBStyleValue } from "../common/functions.js";
import { ArrowPathIcon } from "@heroicons/react/24/outline";

const ColorPicker = (props) => {
  const {
    red,
    green,
    blue,
    onChangeRed,
    onChangeBlue,
    onChangeGreen,
    onRandomColor,
  } = props;

  return (
    <div>
      <div className="flex flex-col items-stretch md:flex-row">
        <div className="md:w-3/4 md:pr-5 md:mb-0 mb-5">
          <Slider
            name="Red"
            min="0"
            max="255"
            onChange={onChangeRed}
            value={red}
          />
          <Slider
            name="Green"
            min="0"
            max="255"
            onChange={onChangeGreen}
            value={green}
          />
          <Slider
            name="Blue"
            min="0"
            max="255"
            onChange={onChangeBlue}
            value={blue}
          />
        </div>
        <div
          className="color-container mx-auto md:ml-auto md:mr-0 rounded p-2 "
          style={{ backgroundColor: getRGBStyleValue(red, green, blue) }}
        >
          <div
            onClick={onRandomColor}
            className="p-1 bg-black/40 w-fit h-fit rounded ml-auto group hover:bg-black/80 cursor-pointer"
          >
            <ArrowPathIcon className="h-6 text-white group-hover:rotate-90 transition-all duration-200" />
          </div>
        </div>
      </div>
    </div>
  );
};

export default ColorPicker;
