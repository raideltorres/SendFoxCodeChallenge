import React from 'react';
import StyleButton from './style-button';

// -----------------------------------------------------------------------------
// Inline control component
// -----------------------------------------------------------------------------
const INLINE_STYLES = [
    {label: 'Bold', style: 'BOLD'},
    {label: 'Italic', style: 'ITALIC'},
    {label: 'Underline', style: 'UNDERLINE'}
];

// -----------------------------------------------------------------------------
// Inline control component
// -----------------------------------------------------------------------------
const InlineStyleControls = (props) => {
    var currentStyle = props.editorState.getCurrentInlineStyle();
    return (
        <div className="rich-editor-controls">
            {INLINE_STYLES.map(type =>
                <StyleButton
                    key={type.label}
                    active={currentStyle.has(type.style)}
                    label={type.label}
                    onToggle={props.onToggle}
                    style={type.style}
                />
            )}
        </div>
    );
};

export default InlineStyleControls;
