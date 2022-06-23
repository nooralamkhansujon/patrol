<div id="treeview_container" class="hummingbird-treeview" style="height: 230px; overflow-y: scroll">
    <ul id="treeview" class="hummingbird-base">
        <li data-id="0">
            @if ($organization->childrens->count() > 0)
                <i class="fa fa-plus"></i>
            @endif
            <label for="xnode-{{ $organization->id }}" class="xnodeitems"
                data-organization="{{ $organization->id }}">
                <input id="xnode-{{ $organization->id }}" value="{{ $organization->id }}"
                    data-id="{{ $organization->id }}" type="checkbox" name="organization" />
                @if ($organization->childrens->count() > 0)
                    <span> <i class="fas fa-folder folder-icon"></i></span>
                @else
                    <span> <i class="fas fa-file file-icon"></i></span>
                @endif
                <span>{{ $organization->name }}</span>
            </label>
            <ul>
                <li><span><i class="fa fa-plus"></i></span>
                    <label for="xnode-3" class="xnodeitems" data-organization="3">
                        <input id="xnode-3" data-id="3" type="checkbox" name="organization" value="3" />
                        <span> <i class="fas fa-folder folder-icon"></i></span>
                        <span>Modules It</span>
                    </label>
                    <ul>
                        <li><i class="fa fa-plus"></i>
                            <label for="xnode-4" class="xnodeitems" data-organization="4">
                                <input id="xnode-4" data-id="4" type="checkbox" name="organization" value="4" />
                                <span><i class="fas fa-folder folder-icon"></i></span>
                                <span>Kfc Technologies</span>
                            </label>
                            <ul>
                                <li>
                                    <label for="xnode-5" class="xnodeitems" data-organization="5">
                                        <input id="xnode-5" value="5" data-id="5" type="checkbox" name="organization" />
                                        <span> <i class="fa fa-file file-icon"></i></span>
                                        <span>kfc child</span>
                                    </label>
                                </li>
                            </ul>
                        <li>
                    </ul>
                <li>
            </ul>
            {{-- @if ($organization->childrens->count() > 0)
                @foreach ($organization->childrens as $orga)
                    @php
                        info(loadOrganizations($orga));
                        echo loadOrganizations($orga);
                    @endphp
                @endforeach
            @endif --}}
        </li>
        {{-- <li data-id="0">
            <i class="fa fa-plus"></i>
            <label for="xnode-0" class="xnodeitems" data-organization="custom-0">
                <input id="xnode-0" value="5" data-id="custom-0" name="organization" type="checkbox"
                    name="organization" />
                <span> <i class="fas fa-folder folder-icon"></i></span>
                <span>Md Noor Alam</span>
            </label>
            <ul>
                <li data-id="1">
                    <i class="fa fa-plus"></i>
                    <label for="xnode-0-1" class="xnodeitems" data-organization="custom-0-1">
                        <input id="xnode-0-1" data-id="custom-0-1" type="checkbox"
                            name="organization" />
                        <span> <i class="fa fa-file file-icon"></i></span>
                        <span>node-0-1</span>
                    </label>
                    <ul>
                        <li>
                            <i class="fa fa-plus"></i>
                            <label for="xnode-0-1-1" class="xnodeitems"
                                data-organization="custom-0-1-1">
                                <input id="xnode-0-1-1" data-id="custom-0-1-1" type="checkbox"
                                    name="organization" />
                                <span> <i class="fa fa-folder folder-icon"></i></span>
                                <span>node-0-1-1</span>
                            </label>
                            <ul>
                                <li>
                                    <i class="fa fa-plus"></i>
                                    <label for="xnode-0-1-1-1" class="xnodeitems" data-organization="custom-0-1-1-1">
                                        <input id="xnode-0-1-1-1" data-id="custom-0-1-1-1" type="checkbox"
                                            name="organization" />
                                        <span> <i class="fa-solid fa-file file-icon"></i></span>
                                        <span>noor alam cuttom</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="xnode-0-1-1-2" class="xnodeitems" data-organization="custom-0-1-1-2">
                                        <input id="xnode-0-1-1-2" data-id="custom-0-1-1-2" type="checkbox"
                                            name="organization" />
                                        my custom testing
                                    </label>
                                </li>
                            </ul>
                   </li>
                    <li>
                        <label for="xnode-0-1-2" class="xnodeitems" data-organization="custom-0-1-2">
                            <input id="xnode-0-1-2" data-id="custom-0-1-2" type="checkbox" name="organization" />
                            node-0-1-2
                        </label>
                    </li>
            </ul>
            </li>
            <li data-id="1">
                <i class="fa fa-plus"></i>
                <label for="xnode-0-2" class="xnodeitems" data-organization="custom-0-2">
                    <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" name="organization" />
                    node-0-2
                </label>
                <ul>
                    <li>
                        <label for="xnode-0-2-1" class="xnodeitems" data-organization="custom-0-2-1">
                            <input class="hummingbird-end-node" id="xnode-0-2-1" data-id="custom-0-2-1"
                                type="checkbox" name="organization" />
                            node-0-2-1
                        </label>
                    </li>
                    <li>
                        <label for="xnode-0-2-2" class="xnodeitems" data-organization="custom-0-2-2">
                            <input class="hummingbird-end-node" id="xnode-0-2-2" data-id="custom-0-2-2"
                                type="checkbox" name="organization" />
                            node-0-2-2
                        </label>
                    </li>
                </ul>
            </li>
            </ul>
            </li>
            </ul> --}}
    </ul>
</div>
