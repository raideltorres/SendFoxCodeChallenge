import React from 'react';

// -----------------------------------------------------------------------------
// Creating the component for the styles buttons
// -----------------------------------------------------------------------------
const StyleButton = (props) => {
    // -------------------------------------------------------------------------
    // Function that will trigger the toggle util function in the parent
    // -------------------------------------------------------------------------
    function onToggle(e) {
        e.preventDefault();
        props.onToggle(props.style);
    };

    // -------------------------------------------------------------------------
    // This will handle if the button is active or not
    // -------------------------------------------------------------------------
    let className = 'rich-editor-style-button';
    if (props.active) {
        className += ' rich-editor-active-button';
    }

    return (
        <span className={className} onMouseDown={onToggle}>
            {props.label}
        </span>
    );
};

export default StyleButton;
