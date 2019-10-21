import React from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';
import {ToastContainer, toast} from 'react-toastify';
import {Editor, EditorState, RichUtils, convertToRaw} from 'draft-js';
import BlockStyleControls from './block-controls';
import InlineStyleControls from './inline-controls';

toast.configure();

// -----------------------------------------------------------------------------
// Main component, I will use function components for all sections, hooks
// for handling the states, a single component structure with
// childs since I will let the routing for laravel and won't use redux for
// a single component since is no really needed. But I usually use redux for
// larger sites combining sagas, api-sauce, redux-sauce and other helpers
// -----------------------------------------------------------------------------
function Main() {
    // -------------------------------------------------------------------------
    // States using hook
    // -------------------------------------------------------------------------
    const [subjectState, setSubjectState] = React.useState('');
    const [editorState, setEditorState] = React.useState(EditorState.createEmpty());

    // -------------------------------------------------------------------------
    // Update the state after every editor or utils change
    // -------------------------------------------------------------------------
    const onChange = (editorState) => setEditorState(editorState);

    // -------------------------------------------------------------------------
    // Update the active editor util for both block and inline styles
    // -------------------------------------------------------------------------
    function toggleBlockType(blockType) {
        onChange(
            RichUtils.toggleBlockType(
                editorState,
                blockType
            )
        );
    }

    function toggleInlineStyle(inlineStyle) {
        onChange(
            RichUtils.toggleInlineStyle(
                editorState,
                inlineStyle
            )
        );
    }

    // -------------------------------------------------------------------------
    // With the custom command string, we can map that string to the
    // desired behavior. If handleKeyCommand returns 'handled' or true,
    // the command is considered handled. If it returns 'not-handled',
    // the command will fall through
    // -------------------------------------------------------------------------
    function handleKeyCommand(command) {
        const newState = RichUtils.handleKeyCommand(editorState, command);
        if (newState) {
            onChange(newState);
            return true;
        }
        return false;
    }

    // -------------------------------------------------------------------------
    // There is a special case for blockquote in the library so we need to
    // handle it and provide the proper value to the blockStyleFn property
    // -------------------------------------------------------------------------
    function getBlockStyle(block) {
        switch (block.getType()) {
            case 'blockquote': return 'rich-editor-blockquote';
            default: return null;
        }
    }

    // -------------------------------------------------------------------------
    // Function to update the subject state
    // -------------------------------------------------------------------------
    function onSubjectChange(e) {
        setSubjectState(e.target.value);
    }

    // -------------------------------------------------------------------------
    // I will call the endpoint here, in redux I could dispatch an action
    // for this
    // -------------------------------------------------------------------------
    function createEmail() {
        if (subjectState === '') {
            toast.error('Subject is required');
            return;
        }

        const contentState = JSON.stringify(convertToRaw(editorState.getCurrentContent()));

        axios({
            method: 'post',
            url: 'email',
            data: {
                subject: subjectState,
                body: contentState
            }
        })
        .then(response => {
            setSubjectState('');
            setEditorState(EditorState.createEmpty());
            toast.success("Mail Created !");
        })
        .catch(error => {
            toast.error(error.statusText);
        });
    }

    return (
        <div className="container home-container">
            <div className="row justify-content-center">
                <div className="col">
                    <div className="card">
                        <div className="card-header">New Mail</div>

                        <div className="card-body">
                            <div className="row justify-content-center">
                                <div className="col-md-12">
                                    <div className="form-group">
                                        <input
                                            onChange={onSubjectChange}
                                            value={subjectState}
                                            type="text"
                                            className="form-control"
                                            autoFocus
                                            placeholder="Subject"
                                        />
                                    </div>
                                </div>
                                <div className="col-md-12">
                                    <div className="rich-editor-root">
                                        <BlockStyleControls
                                            editorState={editorState}
                                            onToggle={toggleBlockType}
                                        />
                                        <InlineStyleControls
                                            editorState={editorState}
                                            onToggle={toggleInlineStyle}
                                        />
                                        <div className="rich-editor-editor">
                                            <Editor
                                                blockStyleFn={getBlockStyle}
                                                editorState={editorState}
                                                handleKeyCommand={handleKeyCommand}
                                                onChange={onChange}
                                                placeholder="Tell a story..."
                                                spellCheck={true}
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-12">
                                    <button className="gray-btn" onClick={createEmail}>Create Mail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Main;

if (document.getElementById('sendfoxcodechallenge')) {
    ReactDOM.render(<Main />, document.getElementById('sendfoxcodechallenge'));
}
