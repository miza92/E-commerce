import React, { Component } from 'react';
import { Container, Row, Col } from 'react-bootstrap';

class Video extends React.Component {
render(){
    const {details, index} = this.props;
    return(
        <li>
            <div id="theVideo">
                <video id="samp" width="640" height="480" controls>
                    <source src = {details.videoPath} type="video/mp4">
                        Your browser does not support this video format.
                    </source>
                </video>
            </div>
            {details.textOfSpeech}
        </li>
    );
}
}
export default Video;