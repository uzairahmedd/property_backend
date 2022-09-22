<section>
    <div class="find-agents-area {{ isset($class) ? $class : 'agent-demo-1' }}" id="property_agents">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="find-agents-title">
                        <div class="left-side-section">
                            <h3 id="property_agent_title">{{ content('property_agents','property_agent_title') }}</h3>
                            <p id="property_agent_descrtiption">{{ content('property_agents','property_agent_descrtiption') }}</p>
                        </div>
                        <div class="right-side-section">
                            <a href="{{ route('agent.list') }}" id="property_agent_btn_title">{{ content('property_agents','property_agent_btn_title') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="agents_data">
                
            </div>
        </div>
    </div>
</section>