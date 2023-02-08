import React from "react";
import { XCircleIcon } from "@heroicons/react/24/solid";
import { getRGBStyleValue } from "../common/functions.js";

const ColorItem = (props) => {
  const { deleteColor } = props;
  const { id, name, red, green, blue, hexcode } = props.item;

  return (
    <div className="flex flex-col p-0.5 w-full md:w-1/2 lg:w-1/3 min-w-50 border border-slate-600 bg-slate-500 rounded hover:scale-105 hover:shadow transition-all duration-200">
      <XCircleIcon
        onClick={(e) => deleteColor(id)}
        className="h-4 text-slate-400 cursor-pointer hover:text-slate-200 ml-auto"
      />
      <div className="flex flex-col p-2 pt-1">
        <div
          style={{ backgroundColor: getRGBStyleValue(red, green, blue) }}
          className="rounded w-full h-8"
        ></div>
        <div className="" style={{ color: getRGBStyleValue(red, green, blue) }}>
          {name}
        </div>
        <div className="text-sm text-slate-200 italic font-light">
          R{red} G{green} B{blue}
        </div>
        <div className="text-sm text-slate-200 italic font-light">
          {hexcode.toUpperCase()}
        </div>
      </div>
    </div>
  );
};

export default ColorItem;
